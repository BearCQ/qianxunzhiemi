<?php
/**
 * Author: 陈庆锋
 * Date: 2018/9/5
 * Time: 14:45
 * Desc: 管理员权限
 */
namespace app\shop_admin_auth\controller;

use app\common\controller\Base;
use app\index\model\System;
use app\shop_admin_auth\model\ShopAdminPageTree;
use think\Db;
use think\Config;
use app\shop_admin_auth\model\ShopAdminPage;

/**
 * @title 管理员页面（模块02-01）
 * @description 接口说明
 * @group 店铺管理员（02）
 * @header name:model_id require:0 default:13-01 desc:秘钥(区别设置)
 * @groupremark 已使用错误码：1-02-01-0001 校验失败 1-02-01-0002 保存失败 1-02-01-0003 校验失败 1-02-01-0004 校验失败 1-02-01-0005 校验失败 1-02-01-0006 修改失败 1-02-01-0007 删除失败
 */
class AdminPage extends Base
{

    /**
     * @title 添加后台页面
     * @description  添加后台页面
     * @author 开发者（陈庆锋）
     * @url /shop_admin_auth/admin_page/add
     * @method POST
     * @param name:path type:int require:1 default:1 other: desc:路径
     * @param name:component require:0 other: desc:组件
     * @param name:redirect require:0 other: desc:重定向地址
     * @param name:alwaysShow require:0 other: desc:一直显示根路由
     * @param name:hidden require:0 other: desc:不在侧边栏线上
     * @param name:ismain require:0 other: desc:是否是主菜单
     * @param name:title require:0 other: desc:设置该路由在侧边栏和面包屑中展示的名字
     * @param name:icon require:0 other: desc:设置该路由的图标
     * @param name:nocache require:0 other: desc:如果设置为true ,则不会被 <keep-alive> 缓存(默认 false)
     * @param name:name require:0 other: desc:设定路由的名字，一定要填写不然使用<keep-alive>时会出现各种问题
     * @param name:parent_id require:0 other: desc:父菜单id
     *
     * @return:
     *
     */
    public function add(){
        $data = input();
        $validate = new \app\shop_admin_auth\validate\ShopAdminPage();
        $validate->scene('add');

        $result = $validate->batch(true)->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            $msg['error_id']='1-03-01-0001';
            return $this->errorJson($msg);
        }
        $model=model('shop_admin_page');
        $re=$model->save($data);

        $m_move_tree=new \app\shop_admin_auth\model\ShopAdminPageTree();
        $parent_id=0;
        if(isset($data['parent_id'])){
            $parent_id=intval($data['parent_id']);
        }
        $m_move_tree->moveTo($model->id,$parent_id);
        if($re){
            $msg['msg']='添加成功';
            $msg['data']=model('shop_admin_page')->find($model->id);
            return $this->successJson($msg);
        }else{
            $msg['msg']='添加失败';
            $msg['error_id']='1-03-01-0002';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 移动菜单
     * @description  移动菜单
     * @author 开发者（梁敏）
     * @url /shop_admin_auth/admin_page/move_to
     * @method POST
     * @param name:token require:0 other: desc:要输入的token
     * @param name:son_id require:0 other: desc:要移动的菜单id
     * @param name:parent_id require:0 other: desc:父菜单id
     *
     * @return:
     *
     */
    public function move_to(){
        $data = input();
        $validate = new \think\Validate;
        $rule = [
            'son_id'  => 'require|number',
            'parent_id'  => 'require|number',

        ];

        $vmsg = [
            'son_id.require' => 'son_id必须',
            'son_id.number'   => 'son_id必须是数字',
            'parent_id.require' => 'parent_id必须',
            'parent_id.number'   => 'parent_id必须是数字',
        ];

        $result   = $validate::make($rule,$vmsg)
            ->batch()
            ->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            $msg['error_id']='1-03-01-0003';
            return $this->errorJson($msg);
        }
        $m_move_tree=new \app\shop_admin_auth\model\ShopAdminPageTree();
        $re=$m_move_tree->moveTo($data['son_id'],$data['parent_id']);
        Db::name('shop_admin_page')->where('id='.$data['son_id'])->update(array('ismain'=>false));
        if($re){
            $msg['msg']='修改成功';
            return $this->successJson($msg);
        }else{
            $msg['msg']='修改失败或已经移动到该节点';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 获取后台菜单
     * @description  获取后台菜单
     * @author 开发者（梁敏）
     * @url /shop_admin_auth/admin_page/get_page_tree
     * @method POST
     * @param name:token require:0 other: desc:token
     * @param name:son_id require:0 other: desc:要移动的菜单id
     * @param name:parent_id require:0 other: desc:父菜单id
     *
     * @return:
     *
     */
    public function get_page_tree(){
        $data = input();

        $rule = [
            'token'  => 'require'
        ];

        $vmsg = [
            'token.require' => 'token必须'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result   = $validate
            ->batch()
            ->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            $msg['error_id']='1-02-01-0004';
            return $this->errorJson($msg);
        }
        $page_roles=Db::name('shop_admin_page_role')
            ->alias('sapr')
            ->join('tp_shop_role sr','sr.id=sapr.shop_role_id')
            ->group('sapr.shop_page_id')
            ->column('GROUP_CONCAT(sr.role) as role,GROUP_CONCAT(sr.name) as role_name,GROUP_CONCAT(sapr.shop_role_id) as role_id','sapr.shop_page_id');
        $pages=Db::name('shop_admin_page_tree')->alias('tr')
            ->join('tp_shop_admin_page sap','tr.son_id=sap.id')
            ->where('tr.depth=1')
            ->order('tr.left asc')
            ->column('tr.*,sap.*','tr.son_id');
        tobool($pages,array('alwaysShow','hidden','ismain','nocache'));
        foreach ($pages as $key=>$page){
            $meta=[];
            if(array_key_exists($page['id'],$page_roles)){
                $meta['roles']=explode(',',$page_roles[$page['id']]['role']);
                $pages[$key]['role_name']=$page_roles[$page['id']]['role_name'];
                $pages[$key]['role_id']=$page_roles[$page['id']]['role_id'];
            }
            if($page['title']){
                $meta['title']=$page['title'];
            }

            if($page['icon']){
                $meta['icon']=$page['icon'];
            }
            if($page['nocache']){
                $meta['noCache']=$page['nocache'];
            }
            if(!$pages[$key]['component']){
                unset($pages[$key]['component']);
            }
            $pages[$key]['meta']=$meta;
        }
        $pages_tree=$this->genTree($pages);
        $msg['msg']='获取成功';
        $msg['data']=$pages_tree;
        return $this->successJson($msg);
    }
    /**
     * 将数据格式化成树形结构
     * @author Xuefen.Tong
     * @param array $items
     * @return array
     */
    function genTree($items) {
        $tree = array(); //格式化好的树
        foreach ($items as $item) {
            if(isset($items[$item['parent_id']])) {
                $items[$item['parent_id']]['children'][] = &$items[$item['id']];
            }else {
                $tree[] = &$items[$item['id']];
            }
        }
        return $tree;
    }
    /**
     * @title 编辑后台菜单
     * @description 编辑后台菜单
     * @author 梁敏
     * @url /shop_admin_auth/admin_page/edit
     * @method *
     *
     * @header name:token require:1 default: desc:token
     * @param id:path type:int require:1 default:1 other: desc:id
     * @param name:path type:int require:1 default:1 other: desc:路径
     * @param name:component require:0 other: desc:组件
     * @param name:redirect require:0 other: desc:重定向地址
     * @param name:alwaysShow require:0 other: desc:一直显示根路由
     * @param name:hidden require:0 other: desc:不在侧边栏线上
     * @param name:ismain require:0 other: desc:是否是主菜单
     * @param name:title require:0 other: desc:设置该路由在侧边栏和面包屑中展示的名字
     * @param name:icon require:0 other: desc:设置该路由的图标
     * @param name:nocache require:0 other: desc:如果设置为true ,则不会被 <keep-alive> 缓存(默认 false)
     * @param name:name require:0 other: desc:设定路由的名字，一定要填写不然使用<keep-alive>时会出现各种问题
     * @param name:parent_id require:0 other: desc:父菜单id
     *@return data:菜单信息@!
     * @data 	id:id
     *@return error_id:1-02-01-0005 校验失败 1-02-01-0006 修改失败
     */
    public function edit(){
        $data=input();
        $validate = new \app\shop_admin_auth\validate\ShopAdminPage();
        $validate->scene('edit');
        $result = $validate->batch(true)->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            $msg['error_id']='1-02-01-0005';
            return $this->errorJson($msg);
        }
        $model=new \app\shop_admin_auth\model\ShopAdminPage();
        $flag = $model->edit($data);
        if($flag!==false){
            $msg['msg']='修改成功';
            $msg['data']=$model->get($data['id']);
            return $this->successJson($msg);
        }else{
            $msg['error_id']='1-02-01-0006';
            $msg['msg']='修改失败';
            return $this->errorJson($msg);
        }
    }

    /**
     * @title 删除菜单信息
     * @description 删除菜单信息
     * @author 梁敏
     * @url /shop_admin_auth/admin_page/delete
     * @method *
     *
     * @param name:token require:1 default: desc:token
     *
     * @param name:id type:int|array require:1 other: desc:要删除的id
     *@return error_id:1-02-01-0007 删除失败
     */
    public function delete(){
        $id=input('id');
        $model=new \app\shop_admin_auth\model\ShopAdminPage();
        $flag = $model->destroy($id);
        if($flag){
            $msg['msg']='删除成功';
            return $this->successJson($msg);
        }else{
            $msg['msg']='删除失败';
            $msg['error_id']='1-02-01-0007';
            return $this->errorJson($msg);
        }
    }

}
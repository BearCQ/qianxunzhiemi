<?php
//自动生成,请根据需要修改
namespace app\shop_admin_auth\controller;
use app\common\controller\Base;
use think\db\Where;

/**
* @title 店铺角色页面（模块02-03）
* @description 店铺角色说明
* @group 店铺管理员（02）
* @header name:model_id require:0 default:13-03 desc:模块
* @groupremark 已使用错误码：1-02-03-0001 校验失败 1-02-03-0002 添加失败 1-02-03-0013 编辑校验失败 1-02-03-0004 编辑失败 1-02-03-0005 获取详情失败  1-02-03-0006 获取列表失败 1-02-03-0007获取单个详情失败 1-02-03-0008 删除失败
*/
class ShopRole extends Base{
		//测试
	public function test(){
		return 'test 111';
	}
	
	/**
	* @title 添加店铺角色
	* @description 添加店铺角色
	* @author 梁敏
	* @url /shop_admin_auth/shop_role/add
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
	* @param name:name type:varchar require:0 other: desc:名称，管理员
	* @param name:role type:varchar require:0 other: desc:标签：如admin
	* @param name:sys_sign type:varchar require:0 other: desc:sys_sign
	*@return data:店铺角色@!
	* @data 	id:id	name:名称，管理员	role:标签：如admin	sys_sign:sys_sign
	*@return error_id:1-02-03-0001 校验失败  1-13-03-0002 添加失败
	*/
	public function add(){
		$data=input();
		/**
		*$validate = new \app\shop_admin_auth\validate\ShopRole();
		*$validate->scene('add');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-02-03-0001';
		*return $this->errorJson($msg);
		*}
		**/
		$model=new \app\shop_admin_auth\model\ShopRole();
		$flag = $model->save($data);
		if($flag){
			$msg['msg']='添加成功';
			$msg['data']=$model->get($model['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-02-03-0002';
			$msg['msg']='添加失败';
			return $this->errorJson($msg);
		}
	}
		/**
	* @title 编辑店铺角色
	* @description 编辑店铺角色
	* @author 梁敏
	* @url /shop_admin_auth/shop_role/edit
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
		* @param name:id type:int require:0 other: desc:id
	* @param name:name type:varchar require:0 other: desc:名称，管理员
	* @param name:role type:varchar require:0 other: desc:标签：如admin
	* @param name:sys_sign type:varchar require:0 other: desc:sys_sign
	*@return data:店铺角色@!
	* @data 	id:id	name:名称，管理员	role:标签：如admin	sys_sign:sys_sign
	*@return error_id:1-02-03-0003 校验失败 1-02-03-0004 修改失败
	*/
	public function edit(){
		$data=input();
		$validate = new \app\shop_admin_auth\validate\ShopRole();
		$validate->scene('edit');
		$result = $validate->batch(true)->check($data);
		if ($result !== true) {
			$msg['msg']='校验失败';
			$msg['validate']=$validate->getError();
			$msg['error_id']='1-02-03-0003';
			return $this->errorJson($msg);
		}
		$model=new \app\shop_admin_auth\model\ShopRole();
		$flag = $model->edit($data);
		if($flag!==false){
			$msg['msg']='修改成功';
			$msg['data']=$model->get($data['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-02-03-0004';
			$msg['msg']='修改失败';
			return $this->errorJson($msg);
		}
	}
		
	/**
	* @title 删除店铺角色
	* @description 删除店铺角色
	* @author 梁敏
	* @url /shop_admin_auth/shop_role/delete
	* @method *
	*
	* @param name:token require:1 default: desc:token
	*
	* @param name:id type:int|array require:1 other: desc:要删除的id
	*@return error_id:1-02-03-0008 删除失败
	*/
	public function delete(){
		$id=input('id');
		$model=new \app\shop_admin_auth\model\ShopRole();
		$flag = $model->destroy($id);
		if($flag){
			$msg['msg']='删除成功';
			return $this->successJson($msg);
		}else{
			$msg['msg']='删除失败';
			$msg['error_id']='1-02-03-0008';
			return $this->errorJson($msg);
		}
	}
	    
    /**
    * @title 单个查询店铺角色
    * @description 单个查询店铺角色
    * @author 梁敏
    * @url /shop_admin_auth/shop_role/info
    * @method *
    *
    * @param name:token require:1 default: desc:token
    *
    * @param name:id type:int require:1 other: desc:要查询的id
    *@return data:店铺角色@!
    * @data 	id:id	name:名称，管理员	role:标签：如admin	sys_sign:sys_sign
    *@return error_id:1-02-03-0005 校验失败 1-02-03-0007 获取失败
    */
    public function info(){
        $id=input('id');
        $data['id']=$id;
        $validate = new \app\shop_admin_auth\validate\ShopRole();
        $validate->scene('info');
        $result = $validate->batch(true)->check($data);
        if ($result !== true) {
        $msg['msg']='校验失败';
        $msg['validate']=$validate->getError();
        $msg['error_id']='1-02-03-0005';
        return $this->errorJson($msg);
        }
        $model=new \app\shop_admin_auth\model\ShopRole();
        $info = $model->find($id);
        if($info){
            $msg['msg']='获取成功';
            $msg['data']=$info;
            return $this->successJson($msg);
        }else{

            $msg['msg']='获取失败';
            $msg['error_id']='1-02-03-0007';
            return $this->successJson($msg);
        }
    }
		
	/**
	* @title 查询列表店铺角色
	* @description 查询列表店铺角色
	* @author 梁敏
	* @url /shop_admin_auth/shop_role/get_list
	* @method *
	*
	* @param name:token require:1 default: desc:token
	*
	* @param name:id type:int require:1 other: desc:要查询的id
	* @return list:店铺角色@
	* @list 	id:id	name:名称，管理员	role:标签：如admin	sys_sign:sys_sign
	*@return error_id:1-02-03-0006 校验失败
	*/
	public function get_list(){
		$model=new \app\shop_admin_auth\model\ShopRole();
		$Fields=$model->getTableFields();
		$data=\think\facade\Request::only($Fields);
        foreach ($data as $k => $v) {
            if ($v === 0) {
                continue;
            }
            if ($v == null)
                unset($data[$k]);
        }
        if (isset($data['name']) && $data['name'] && !empty($data['name'])) {
            $data['name'] = array('like', "%{$data['name']}%");
        }
        if (isset($data['role']) && $data['role'] && !empty($data['role'])) {
            $data['role'] = array('like', "%{$data['role']}%");
        }
        $data = new Where($data);
		/**
		*$validate = new \app\shop_admin_auth\validate\ShopRole();
		*$validate->scene('lists');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-02-03-0006';
		*return $this->errorJson($msg);
		*}
		**/
		//每页显示10条数据
		$list = $model->where($data)->order('id','desc')->paginate();
		$msg['list']=$list;
		return $this->successJson($msg);
	}
}

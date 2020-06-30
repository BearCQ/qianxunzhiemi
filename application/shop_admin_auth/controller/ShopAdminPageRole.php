<?php
//自动生成,请根据需要修改
namespace app\shop_admin_auth\controller;
use app\common\controller\Base;
use app\shop_admin_auth\Validate\ShopAdminPage;

/**
* @title 店铺管理页面角色页面（模块02-04）
* @description 店铺管理页面角色说明
* @group 店铺管理员（02）
* @header name:model_id require:0 default:13-04 desc:模块
* @groupremark 已使用错误码：1-02-04-0001 校验失败 1-02-04-0002 添加失败 1-02-04-0003 编辑校验失败 1-02-04-0004 编辑失败 1-02-04-0005 获取详情失败  1-02-04-0006 获取列表失败 1-02-04-0007获取单个详情失败 1-02-04-0008 删除失败
*/
class ShopAdminPageRole extends Base{
		//测试
	public function test(){
		return 'test 111';
	}
	
	/**
	* @title 添加店铺管理页面角色
	* @description 添加店铺管理页面角色
	* @author 邓汉炜
	* @url /shop_admin_auth/shop_admin_page_role/add
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
	* @param name:shop_page_id type:int require:0 other: desc:页面页面id
	* @param name:shop_role_id type:int require:0 other: desc:角色id
	* @param name:sys_sign type:varchar require:0 other: desc:sys_sign
	*@return data:店铺管理页面角色@!
	* @data 	shop_page_id:页面页面id	shop_role_id:角色id	sys_sign:sys_sign
	*@return error_id:1-02-04-0001 校验失败  1-02-04-0002 添加失败
	*/
	public function add(){
		$data=input();
		/**
		*$validate = new \app\shop_admin_auth\validate\ShopAdminPageRole();
		*$validate->scene('add');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-13-04-0001';
		*return $this->errorJson($msg);
		*}
		**/
//		$model=new \app\shop_admin_auth\model\ShopAdminPageRole();
//		$flag = $model->save($data);
        //[ [1,2],[ ]
        //验证
        $validate = new \app\shop_admin_auth\validate\ShopAdminPageRole();
        $validate->scene('add');
        if (!$validate->batch(true)->check($data)){
            $msg['msg'] = $validate->getError();
            return $this->errorJson($msg);
        }
        static $dataArr = [];//重组数据
        if (count($data['shop_role_id']) > 1){
            foreach ($data['shop_role_id'] as $k => $v){
                static $i = 0;
                if (!empty($v)){
                    $dataArr[$i]['shop_page_id'] = $data['shop_page_id'];
                    $dataArr[$i]['shop_role_id'] = $data['shop_role_id'][$k];
                    $dataArr[$i]['sys_sign'] = 'base';
                    unset($data['shop_role_id'][$k]);
                    $i++;
                }
            }
            if(count($dataArr) == 1){
                $data = $dataArr[0];
                //删除数据表中存在shop_page_id的数据
                db('shop_admin_page_role')->where('shop_page_id',$data['shop_page_id'])
                                                ->where('shop_role_id',$data["shop_role_id"])
                                                ->delete();
                $flag = db('shop_admin_page_role')->strict(false)->insert($data);
            }else{
                $data = $dataArr;
                foreach($data as $key=>$value){
//                    dump($value);
                    $val = db('shop_admin_page_role')->where('shop_page_id',$value['shop_page_id'])
                                                    ->where('shop_role_id',$value["shop_role_id"])
                                                    ->find();
                    if(!empty($val)){
                        //删除重复值
                        db('shop_admin_page_role')->where('shop_page_id',$value['shop_page_id'])
                                                        ->where('shop_role_id',$value["shop_role_id"])
                                                        ->delete();
                    }
                }
                $flag = db('shop_admin_page_role')->strict(false)->insertAll($data);
            }
        }else{
            //在api文档
            if (gettype($data['shop_role_id']) == 'array'){
                $data['shop_role_id'] = $data['shop_role_id'][0];
            }
            //删除数据表中已存在的shop_page_id--shop_role_id
            db('shop_admin_page_role')->where('shop_page_id',$data['shop_page_id'])
                                            ->where('shop_role_id',$data["shop_role_id"])
                                            ->delete();
            $flag = db('shop_admin_page_role')->strict(false)->insert($data);
        }
		if($flag){
			$msg['msg']='添加成功';
			$msg['data']=$data;
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-13-04-0002';
			$msg['msg']='添加失败';
			return $this->errorJson($msg);
		}
	}
		/**
	* @title 编辑店铺管理页面角色
	* @description 编辑店铺管理页面角色
	* @author 邓汉炜
	* @url /shop_admin_auth/shop_admin_page_role/edit
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
		* @param name:shop_page_id type:int require:0 other: desc:页面页面id
	* @param name:shop_role_id type:int require:0 other: desc:角色id(如果输入多个角色id，在角色id之间加",")
	* @param name:sys_sign type:varchar require:0 other: desc:sys_sign
	*@return data:店铺管理页面角色@!
	* @data 	shop_page_id:页面页面id	shop_role_id:角色id	sys_sign:sys_sign
	*@return error_id:1-02-04-0003 校验失败 1-02-04-0004 修改失败
	*/
	public function edit(){
		$data=input();
		$validate = new \app\shop_admin_auth\validate\ShopAdminPageRole();
		$validate->scene('edit');
		$result = $validate->batch(true)->check($data);
		if ($result !== true) {
			$msg['msg']='校验失败';
			$msg['validate']=$validate->getError();
			$msg['error_id']='1-02-04-0003';
			return $this->errorJson($msg);
		}
        //删除shop_page_id下所有的shop_role_id
        //去掉重复的shop_role_id
        $arr =array_unique(explode(',',$data['shop_role_id']));
        $data['shop_role_id']= implode(',',$arr);
		db('shop_admin_page_role')->where('shop_page_id',$data['shop_page_id'])->delete();
        $shop_role_id = explode(',',$data['shop_role_id']);
        foreach ($shop_role_id as $key=>$value){
            $dataArr[$key]['shop_page_id'] = $data['shop_page_id'];
            $dataArr[$key]['shop_role_id'] = $value;
            $dataArr[$key]['sys_sign'] = 'base';
        }
        //更新修改数据
        if (count($dataArr) > 1){
            $flag = db('shop_admin_page_role')->strict(false)->insertAll($dataArr);
        }else{
            $dataArr = $dataArr[0];
            $flag = db('shop_admin_page_role')->strict(false)->insert($dataArr);
        }
		if($flag!==false){
			$msg['msg']='修改成功';
			$msg['data']=$dataArr;
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-02-04-0004';
			$msg['msg']='修改失败';
			return $this->errorJson($msg);
		}
	}
		
	/**
	* @title 删除店铺管理页面角色
	* @description 删除店铺管理页面角色
	* @author 邓汉炜
	* @url /shop_admin_auth/shop_admin_page_role/delete
	* @method *
	*
	* @param name:token require:1 default: desc:token
	*
	* @param name:shop_page_id type:int|array require:1 other: desc:店铺页面的id
	* @param name:shop_role_id type:int|array require:1 other: desc:管理店铺角色的id
	*@return error_id:1-02-04-0008 删除失败
	*/
	public function delete(){
		$data=input();
		//验证
        $validate = new \app\shop_admin_auth\validate\ShopAdminPageRole();
        $validate->scene('del');
        if (!$validate->batch(true)->check($data)){
            $msg['msg'] = $validate->getError();
            return $this->errorJson($msg);
        }
        $flag = db('shop_admin_page_role')
                    ->where('shop_page_id',$data["shop_page_id"])
                    ->where('shop_role_id',$data["shop_role_id"])
                    ->delete();
		if($flag){
			$msg['msg']='删除成功';
			return $this->successJson($msg);
		}else{
			$msg['msg']='删除失败';
			$msg['error_id']='1-02-04-0008';
			return $this->errorJson($msg);
		}
	}
	    
    /**
    * @title 单个查询店铺管理页面角色
    * @description 单个查询店铺管理页面角色
    * @author 邓汉炜
    * @url /shop_admin_auth/shop_admin_page_role/info
    * @method *
    *
    * @param name:token require:1 default: desc:token
    *
        * @param name:shop_page_id type:int require:0 other: desc:页面页面id
    * @param name:shop_role_id type:int require:0 other: desc:角色id
    * @param name:sys_sign type:varchar require:0 other: desc:sys_sign
    *@return data:店铺管理页面角色@!
    * @data 	shop_page_id:页面页面id	shop_role_id:角色id	sys_sign:sys_sign
    *@return error_id:1-02-04-0005 校验失败 1-02-04-0007 获取失败
    */
    public function info(){
        $model=new \app\shop_admin_auth\model\ShopAdminPageRole();
        $Fields=$model->getTableFields();
        $data=\think\facade\Request::only($Fields);
        /**
        *$validate = new \app\shop_admin_auth\validate\ShopAdminPageRole();
        *$validate->scene('info');
        *$result = $validate->batch(true)->check($data);
        */
        if (!$data) {
            $msg['msg']='必须有参数';
            $msg['error_id']='1-02-04-0005';
            return $this->errorJson($msg);
        }
        $model=new \app\shop_admin_auth\model\ShopAdminPageRole();
        $info = $model->where($data)->find();
        if($info){
            $msg['msg']='获取成功';
            $msg['data']=$info;
            return $this->successJson($msg);
        }else{

            $msg['msg']='获取失败';
            $msg['error_id']='1-02-04-0007';
            return $this->successJson($msg);
        }
    }
		
	/**
	* @title 查询列表店铺管理页面角色
	* @description 查询列表店铺管理页面角色
	* @author 邓汉炜
	* @url /shop_admin_auth/shop_admin_page_role/get_list
	* @method *
	*
	* @param name:token require:1 default: desc:token
	* @return list:店铺管理页面角色@
	* @list 	shop_page_id:页面页面id	shop_role_id:角色id	sys_sign:sys_sign
	*@return error_id:1-02-04-0006 校验失败
	*/
	public function get_list(){
		$model=new \app\shop_admin_auth\model\ShopAdminPageRole();
		$Fields=$model->getTableFields();
		$data=\think\facade\Request::only($Fields);
		/**
		*$validate = new \app\shop_admin_auth\validate\ShopAdminPageRole();
		*$validate->scene('lists');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-13-04-0006';
		*return $this->errorJson($msg);
		*}
		**/
		//每页显示10条数据
		$list = $model->where($data)->paginate();
		$msg['list']=$list;
		return $this->successJson($msg);
	}
}

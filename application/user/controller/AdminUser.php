<?php
//自动生成,请根据需要修改
namespace app\user\controller;
use app\common\controller\Base;
use think\Db;
use tools\curl\Curl;
/**
* @title 管理员信息页面（模块03-02）
* @description 管理员信息说明
* @group 用户中心（03）
* @header name:model_id require:0 default:03-02 desc:模块
* @groupremark 已使用错误码：1-03-02-0001 校验失败 1-03-02-0002 添加失败 1-03-02-0003 编辑校验失败 1-03-02-0004 编辑失败 1-03-02-0005 获取详情失败  1-03-02-0006 获取列表失败 1-03-02-0007获取单个详情失败 1-03-02-0008 删除失败
*/
class AdminUser extends Base{
		//测试
	public function test(){
		return 'test 111';
	}
	
	/**
	* @title 添加管理员信息
	* @description 添加管理员信息
	* @author 颜东淦
	* @url /user/admin_user/add
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
	*@return data:管理员信息@!
	* @data 
	*@return error_id:1-03-02-0001 校验失败  1-03-02-0002 添加失败
	*/
	public function add(){
		$data=input();
		/**
		*$validate = new \app\user\validate\AdminUser();
		*$validate->scene('add');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-03-02-0001';
		*return $this->errorJson($msg);
		*}
		**/
		$model=new \app\user\model\AdminUser();
		$flag = $model->save($data);
		if($flag){
			$msg['msg']='添加成功';
			$msg['data']=$model->get($model['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-03-02-0002';
			$msg['msg']='添加失败';
			return $this->errorJson($msg);
		}
	}
		/**
	* @title 编辑管理员信息
	* @description 编辑管理员信息
	* @author 颜东淦
	* @url /user/admin_user/edit
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
		*@return data:管理员信息@!
	* @data 
	*@return error_id:1-03-02-0003 校验失败 1-03-02-0004 修改失败
	*/
	public function edit(){
		$data=input();
		$validate = new \app\user\validate\AdminUser();
		$validate->scene('edit');
		$result = $validate->batch(true)->check($data);
		if ($result !== true) {
			$msg['msg']='校验失败';
			$msg['validate']=$validate->getError();
			$msg['error_id']='1-03-02-0003';
			return $this->errorJson($msg);
		}
		$model=new \app\user\model\AdminUser();
		$flag = $model->edit($data);
		if($flag!==false){
			$msg['msg']='修改成功';
			$msg['data']=$model->get($data['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-03-02-0004';
			$msg['msg']='修改失败';
			return $this->errorJson($msg);
		}
	}
		
	/**
	* @title 删除管理员信息
	* @description 删除管理员信息
	* @author 颜东淦
	* @url /user/admin_user/delete
	* @method *
	*
	* @param name:token require:1 default: desc:token
	*
	* @param name:id type:int|array require:1 other: desc:要删除的id
	*@return error_id:1-03-02-0008 删除失败
	*/
	public function delete(){
		$id=input('id');
		$model=new \app\user\model\AdminUser();
		$flag = $model->destroy($id);
		if($flag){
			$msg['msg']='删除成功';
			return $this->successJson($msg);
		}else{
			$msg['msg']='删除失败';
			$msg['error_id']='1-03-02-0008';
			return $this->errorJson($msg);
		}
	}
	    
    /**
    * @title 单个查询管理员信息
    * @description 单个查询管理员信息
    * @author 颜东淦
    * @url /user/admin_user/info
    * @method *
    *
    * @param name:token require:1 default: desc:token
    * @param name:id require:1 default: desc:id
    * @param name:username require:1 default: desc:username
    *
        *@return data:管理员信息@!
    * @data 
    *@return error_id:1-03-02-0005 校验失败 1-03-02-0007 获取失败
    */
    public function info(){
        $model=new \app\user\model\AdminUser();
        $Fields=$model->getTableFields();
        $data=\think\facade\Request::only($Fields);
        /**
        *$validate = new \app\user\validate\AdminUser();
        *$validate->scene('info');
        *$result = $validate->batch(true)->check($data);
        */
        if (!$data) {
            $msg['msg']='必须有参数';
            $msg['error_id']='1-03-02-0005';
            return $this->errorJson($msg);
        }
        $model=new \app\user\model\AdminUser();
        $info = $model->where($data)->find();
        if($info){
            $msg['msg']='获取成功';
            $msg['data']=$info;
            return $this->successJson($msg);
        }else{

            $msg['msg']='获取失败';
            $msg['error_id']='1-03-02-0007';
            return $this->errorJson($msg);
        }
    }
		
	/**
	* @title 查询列表管理员信息
	* @description 查询列表管理员信息
	* @author 颜东淦
	* @url /user/admin_user/get_list
	* @method *
	* @param name:token require:1 default: desc:token
	* @param name:page require:1 default: desc:第几页
	* @param name:pagesize require:1 default: desc:每页数
	* @return list:管理员信息@
	* @list 
	*@return error_id:1-03-02-0006 校验失败
	*/
	public function get_list(){
		$model=new \app\user\model\AdminUser();
		$Fields=$model->getTableFields();
		$data=\think\facade\Request::only($Fields);
		/**
		*$validate = new \app\user\validate\AdminUser();
		*$validate->scene('lists');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-03-02-0006';
		*return $this->errorJson($msg);
		*}
		**/
		$list = $model->where($data)->order('id desc')->paginate();
		$msg['list']=$list;
		return $this->successJson($msg);
	}

    /**
     * @title 后台通过token获取用户信息
     * @description 后台通过token获取用户信息
     * @author 颜东淦
     * @url /user/admin_user/info_by_token
     * @method *
     * @param name:token require:1 default: desc:token
     */
    public function info_by_token()
    {
        $data = input();

        $result = Db::name('admin_user')
            ->where('id', USERID)
            ->where('status', 1)
            ->find();

        //调用管理员权限模块，获取管理员的角色
        $admin_auth_model_api = Config('model_api.shop_admin_auth');
        $url = $admin_auth_model_api."/admin_role/role_by_token";
        $role_list = Curl::post($url, array('token'=> $data['token']));

        $role_list = Curl::json2arr($role_list);
        if(!$role_list['status']){
            $msg['role_list']=[];
            $msg['msg']='获取角色失败';
            $msg['error_id']='1-02-02-0003';
            $msg['url']=$url;
            return $this->errorJson($msg);
        }
        $msg['role_list']=$role_list;
        $role_list=$role_list['list'];

        $roles=[];
        if (is_array($role_list)) {
            foreach ($role_list as $role){
                $roles[]=$role['role'];
            }
        }

        //获取角色数据
        $msg['roles'] = $roles;

        if ($result) {
            $msg['msg'] = '用户信息获取成功';
            $msg['data'] = $result;
            return $this->successJson($msg);
        } else {
            $msg['msg'] = '用户信息获取失败';
            return $this->errorJson($msg);
        }
    }
}

<?php
//自动生成,请根据需要修改
namespace app\user\controller;
use app\common\controller\Base;
/**
* @title 用户信息页面（模块03-01）
* @description 用户信息说明
* @group 用户中心（03）
* @header name:model_id require:0 default:03-01 desc:模块
* @groupremark 已使用错误码：1-03-01-0001 校验失败 1-03-01-0002 添加失败 1-03-01-0003 编辑校验失败 1-03-01-0004 编辑失败 1-03-01-0005 获取详情失败  1-03-01-0006 获取列表失败 1-03-01-0007获取单个详情失败 1-03-01-0008 删除失败
*/
class User extends Base{
		//测试
	public function test(){
		return 'test 111';
	}
	
	/**
	* @title 添加用户信息
	* @description 添加用户信息
	* @author 颜东淦
	* @url /user/user/add
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
	* @param name:Host type:char require:0 other: desc:Host
	* @param name:User type:char require:0 other: desc:User
	* @param name:Password type:char require:0 other: desc:Password
	* @param name:Select_priv type:enum require:0 other: desc:Select_priv
	* @param name:Insert_priv type:enum require:0 other: desc:Insert_priv
	* @param name:Update_priv type:enum require:0 other: desc:Update_priv
	* @param name:Delete_priv type:enum require:0 other: desc:Delete_priv
	* @param name:Create_priv type:enum require:0 other: desc:Create_priv
	* @param name:Drop_priv type:enum require:0 other: desc:Drop_priv
	* @param name:Reload_priv type:enum require:0 other: desc:Reload_priv
	* @param name:Shutdown_priv type:enum require:0 other: desc:Shutdown_priv
	* @param name:Process_priv type:enum require:0 other: desc:Process_priv
	* @param name:File_priv type:enum require:0 other: desc:File_priv
	* @param name:Grant_priv type:enum require:0 other: desc:Grant_priv
	* @param name:References_priv type:enum require:0 other: desc:References_priv
	* @param name:Index_priv type:enum require:0 other: desc:Index_priv
	* @param name:Alter_priv type:enum require:0 other: desc:Alter_priv
	* @param name:Show_db_priv type:enum require:0 other: desc:Show_db_priv
	* @param name:Super_priv type:enum require:0 other: desc:Super_priv
	* @param name:Create_tmp_table_priv type:enum require:0 other: desc:Create_tmp_table_priv
	* @param name:Lock_tables_priv type:enum require:0 other: desc:Lock_tables_priv
	* @param name:Execute_priv type:enum require:0 other: desc:Execute_priv
	* @param name:Repl_slave_priv type:enum require:0 other: desc:Repl_slave_priv
	* @param name:Repl_client_priv type:enum require:0 other: desc:Repl_client_priv
	* @param name:Create_view_priv type:enum require:0 other: desc:Create_view_priv
	* @param name:Show_view_priv type:enum require:0 other: desc:Show_view_priv
	* @param name:Create_routine_priv type:enum require:0 other: desc:Create_routine_priv
	* @param name:Alter_routine_priv type:enum require:0 other: desc:Alter_routine_priv
	* @param name:Create_user_priv type:enum require:0 other: desc:Create_user_priv
	* @param name:Event_priv type:enum require:0 other: desc:Event_priv
	* @param name:Trigger_priv type:enum require:0 other: desc:Trigger_priv
	* @param name:Create_tablespace_priv type:enum require:0 other: desc:Create_tablespace_priv
	* @param name:ssl_type type:enum require:0 other: desc:ssl_type
	* @param name:ssl_cipher type:blob require:0 other: desc:ssl_cipher
	* @param name:x509_issuer type:blob require:0 other: desc:x509_issuer
	* @param name:x509_subject type:blob require:0 other: desc:x509_subject
	* @param name:max_questions type:int require:0 other: desc:max_questions
	* @param name:max_updates type:int require:0 other: desc:max_updates
	* @param name:max_connections type:int require:0 other: desc:max_connections
	* @param name:max_user_connections type:int require:0 other: desc:max_user_connections
	* @param name:plugin type:char require:0 other: desc:plugin
	* @param name:authentication_string type:text require:0 other: desc:authentication_string
	*@return data:用户信息@!
	* @data 	Host:Host	User:User	Password:Password	Select_priv:Select_priv	Insert_priv:Insert_priv	Update_priv:Update_priv	Delete_priv:Delete_priv	Create_priv:Create_priv	Drop_priv:Drop_priv	Reload_priv:Reload_priv	Shutdown_priv:Shutdown_priv	Process_priv:Process_priv	File_priv:File_priv	Grant_priv:Grant_priv	References_priv:References_priv	Index_priv:Index_priv	Alter_priv:Alter_priv	Show_db_priv:Show_db_priv	Super_priv:Super_priv	Create_tmp_table_priv:Create_tmp_table_priv	Lock_tables_priv:Lock_tables_priv	Execute_priv:Execute_priv	Repl_slave_priv:Repl_slave_priv	Repl_client_priv:Repl_client_priv	Create_view_priv:Create_view_priv	Show_view_priv:Show_view_priv	Create_routine_priv:Create_routine_priv	Alter_routine_priv:Alter_routine_priv	Create_user_priv:Create_user_priv	Event_priv:Event_priv	Trigger_priv:Trigger_priv	Create_tablespace_priv:Create_tablespace_priv	ssl_type:ssl_type	ssl_cipher:ssl_cipher	x509_issuer:x509_issuer	x509_subject:x509_subject	max_questions:max_questions	max_updates:max_updates	max_connections:max_connections	max_user_connections:max_user_connections	plugin:plugin	authentication_string:authentication_string
	*@return error_id:1-03-01-0001 校验失败  1-03-01-0002 添加失败
	*/
	public function add(){
		$data=input();
		/**
		*$validate = new \app\user\validate\User();
		*$validate->scene('add');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-03-01-0001';
		*return $this->errorJson($msg);
		*}
		**/
		$model=new \app\user\model\User();
		$flag = $model->save($data);
		if($flag){
			$msg['msg']='添加成功';
			$msg['data']=$model->get($model['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-03-01-0002';
			$msg['msg']='添加失败';
			return $this->errorJson($msg);
		}
	}
		/**
	* @title 编辑用户信息
	* @description 编辑用户信息
	* @author 颜东淦
	* @url /user/user/edit
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
		* @param name:Host type:char require:0 other: desc:Host
		* @param name:User type:char require:0 other: desc:User
		* @param name:Password type:char require:0 other: desc:Password
		* @param name:Select_priv type:enum require:0 other: desc:Select_priv
		* @param name:Insert_priv type:enum require:0 other: desc:Insert_priv
		* @param name:Update_priv type:enum require:0 other: desc:Update_priv
		* @param name:Delete_priv type:enum require:0 other: desc:Delete_priv
		* @param name:Create_priv type:enum require:0 other: desc:Create_priv
		* @param name:Drop_priv type:enum require:0 other: desc:Drop_priv
		* @param name:Reload_priv type:enum require:0 other: desc:Reload_priv
		* @param name:Shutdown_priv type:enum require:0 other: desc:Shutdown_priv
		* @param name:Process_priv type:enum require:0 other: desc:Process_priv
		* @param name:File_priv type:enum require:0 other: desc:File_priv
		* @param name:Grant_priv type:enum require:0 other: desc:Grant_priv
		* @param name:References_priv type:enum require:0 other: desc:References_priv
		* @param name:Index_priv type:enum require:0 other: desc:Index_priv
		* @param name:Alter_priv type:enum require:0 other: desc:Alter_priv
		* @param name:Show_db_priv type:enum require:0 other: desc:Show_db_priv
		* @param name:Super_priv type:enum require:0 other: desc:Super_priv
		* @param name:Create_tmp_table_priv type:enum require:0 other: desc:Create_tmp_table_priv
		* @param name:Lock_tables_priv type:enum require:0 other: desc:Lock_tables_priv
		* @param name:Execute_priv type:enum require:0 other: desc:Execute_priv
		* @param name:Repl_slave_priv type:enum require:0 other: desc:Repl_slave_priv
		* @param name:Repl_client_priv type:enum require:0 other: desc:Repl_client_priv
		* @param name:Create_view_priv type:enum require:0 other: desc:Create_view_priv
		* @param name:Show_view_priv type:enum require:0 other: desc:Show_view_priv
		* @param name:Create_routine_priv type:enum require:0 other: desc:Create_routine_priv
		* @param name:Alter_routine_priv type:enum require:0 other: desc:Alter_routine_priv
		* @param name:Create_user_priv type:enum require:0 other: desc:Create_user_priv
		* @param name:Event_priv type:enum require:0 other: desc:Event_priv
		* @param name:Trigger_priv type:enum require:0 other: desc:Trigger_priv
		* @param name:Create_tablespace_priv type:enum require:0 other: desc:Create_tablespace_priv
		* @param name:ssl_type type:enum require:0 other: desc:ssl_type
		* @param name:ssl_cipher type:blob require:0 other: desc:ssl_cipher
		* @param name:x509_issuer type:blob require:0 other: desc:x509_issuer
		* @param name:x509_subject type:blob require:0 other: desc:x509_subject
		* @param name:max_questions type:int require:0 other: desc:max_questions
		* @param name:max_updates type:int require:0 other: desc:max_updates
		* @param name:max_connections type:int require:0 other: desc:max_connections
		* @param name:max_user_connections type:int require:0 other: desc:max_user_connections
		* @param name:plugin type:char require:0 other: desc:plugin
		* @param name:authentication_string type:text require:0 other: desc:authentication_string
		*@return data:用户信息@!
	* @data 	Host:Host	User:User	Password:Password	Select_priv:Select_priv	Insert_priv:Insert_priv	Update_priv:Update_priv	Delete_priv:Delete_priv	Create_priv:Create_priv	Drop_priv:Drop_priv	Reload_priv:Reload_priv	Shutdown_priv:Shutdown_priv	Process_priv:Process_priv	File_priv:File_priv	Grant_priv:Grant_priv	References_priv:References_priv	Index_priv:Index_priv	Alter_priv:Alter_priv	Show_db_priv:Show_db_priv	Super_priv:Super_priv	Create_tmp_table_priv:Create_tmp_table_priv	Lock_tables_priv:Lock_tables_priv	Execute_priv:Execute_priv	Repl_slave_priv:Repl_slave_priv	Repl_client_priv:Repl_client_priv	Create_view_priv:Create_view_priv	Show_view_priv:Show_view_priv	Create_routine_priv:Create_routine_priv	Alter_routine_priv:Alter_routine_priv	Create_user_priv:Create_user_priv	Event_priv:Event_priv	Trigger_priv:Trigger_priv	Create_tablespace_priv:Create_tablespace_priv	ssl_type:ssl_type	ssl_cipher:ssl_cipher	x509_issuer:x509_issuer	x509_subject:x509_subject	max_questions:max_questions	max_updates:max_updates	max_connections:max_connections	max_user_connections:max_user_connections	plugin:plugin	authentication_string:authentication_string
	*@return error_id:1-03-01-0003 校验失败 1-03-01-0004 修改失败
	*/
	public function edit(){
		$data=input();
		$validate = new \app\user\validate\User();
		$validate->scene('edit');
		$result = $validate->batch(true)->check($data);
		if ($result !== true) {
			$msg['msg']='校验失败';
			$msg['validate']=$validate->getError();
			$msg['error_id']='1-03-01-0003';
			return $this->errorJson($msg);
		}
		$model=new \app\user\model\User();
		$flag = $model->edit($data);
		if($flag!==false){
			$msg['msg']='修改成功';
			$msg['data']=$model->get($data['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-03-01-0004';
			$msg['msg']='修改失败';
			return $this->errorJson($msg);
		}
	}
		
	/**
	* @title 删除用户信息
	* @description 删除用户信息
	* @author 颜东淦
	* @url /user/user/delete
	* @method *
	*
	* @param name:token require:1 default: desc:token
	*
	* @param name:id type:int|array require:1 other: desc:要删除的id
	*@return error_id:1-03-01-0008 删除失败
	*/
	public function delete(){
		$id=input('id');
		$model=new \app\user\model\User();
		$flag = $model->destroy($id);
		if($flag){
			$msg['msg']='删除成功';
			return $this->successJson($msg);
		}else{
			$msg['msg']='删除失败';
			$msg['error_id']='1-03-01-0008';
			return $this->errorJson($msg);
		}
	}
	    
    /**
    * @title 单个查询用户信息
    * @description 单个查询用户信息
    * @author 颜东淦
    * @url /user/user/info
    * @method *
    *
    * @param name:token require:1 default: desc:token
    *
        * @param name:Host type:char require:0 other: desc:Host
        * @param name:User type:char require:0 other: desc:User
        * @param name:Password type:char require:0 other: desc:Password
        * @param name:Select_priv type:enum require:0 other: desc:Select_priv
        * @param name:Insert_priv type:enum require:0 other: desc:Insert_priv
        * @param name:Update_priv type:enum require:0 other: desc:Update_priv
        * @param name:Delete_priv type:enum require:0 other: desc:Delete_priv
        * @param name:Create_priv type:enum require:0 other: desc:Create_priv
        * @param name:Drop_priv type:enum require:0 other: desc:Drop_priv
        * @param name:Reload_priv type:enum require:0 other: desc:Reload_priv
        * @param name:Shutdown_priv type:enum require:0 other: desc:Shutdown_priv
        * @param name:Process_priv type:enum require:0 other: desc:Process_priv
        * @param name:File_priv type:enum require:0 other: desc:File_priv
        * @param name:Grant_priv type:enum require:0 other: desc:Grant_priv
        * @param name:References_priv type:enum require:0 other: desc:References_priv
        * @param name:Index_priv type:enum require:0 other: desc:Index_priv
        * @param name:Alter_priv type:enum require:0 other: desc:Alter_priv
        * @param name:Show_db_priv type:enum require:0 other: desc:Show_db_priv
        * @param name:Super_priv type:enum require:0 other: desc:Super_priv
        * @param name:Create_tmp_table_priv type:enum require:0 other: desc:Create_tmp_table_priv
        * @param name:Lock_tables_priv type:enum require:0 other: desc:Lock_tables_priv
        * @param name:Execute_priv type:enum require:0 other: desc:Execute_priv
        * @param name:Repl_slave_priv type:enum require:0 other: desc:Repl_slave_priv
        * @param name:Repl_client_priv type:enum require:0 other: desc:Repl_client_priv
        * @param name:Create_view_priv type:enum require:0 other: desc:Create_view_priv
        * @param name:Show_view_priv type:enum require:0 other: desc:Show_view_priv
        * @param name:Create_routine_priv type:enum require:0 other: desc:Create_routine_priv
        * @param name:Alter_routine_priv type:enum require:0 other: desc:Alter_routine_priv
        * @param name:Create_user_priv type:enum require:0 other: desc:Create_user_priv
        * @param name:Event_priv type:enum require:0 other: desc:Event_priv
        * @param name:Trigger_priv type:enum require:0 other: desc:Trigger_priv
        * @param name:Create_tablespace_priv type:enum require:0 other: desc:Create_tablespace_priv
        * @param name:ssl_type type:enum require:0 other: desc:ssl_type
        * @param name:ssl_cipher type:blob require:0 other: desc:ssl_cipher
        * @param name:x509_issuer type:blob require:0 other: desc:x509_issuer
        * @param name:x509_subject type:blob require:0 other: desc:x509_subject
        * @param name:max_questions type:int require:0 other: desc:max_questions
        * @param name:max_updates type:int require:0 other: desc:max_updates
        * @param name:max_connections type:int require:0 other: desc:max_connections
        * @param name:max_user_connections type:int require:0 other: desc:max_user_connections
        * @param name:plugin type:char require:0 other: desc:plugin
        * @param name:authentication_string type:text require:0 other: desc:authentication_string
        *@return data:用户信息@!
    * @data 	Host:Host	User:User	Password:Password	Select_priv:Select_priv	Insert_priv:Insert_priv	Update_priv:Update_priv	Delete_priv:Delete_priv	Create_priv:Create_priv	Drop_priv:Drop_priv	Reload_priv:Reload_priv	Shutdown_priv:Shutdown_priv	Process_priv:Process_priv	File_priv:File_priv	Grant_priv:Grant_priv	References_priv:References_priv	Index_priv:Index_priv	Alter_priv:Alter_priv	Show_db_priv:Show_db_priv	Super_priv:Super_priv	Create_tmp_table_priv:Create_tmp_table_priv	Lock_tables_priv:Lock_tables_priv	Execute_priv:Execute_priv	Repl_slave_priv:Repl_slave_priv	Repl_client_priv:Repl_client_priv	Create_view_priv:Create_view_priv	Show_view_priv:Show_view_priv	Create_routine_priv:Create_routine_priv	Alter_routine_priv:Alter_routine_priv	Create_user_priv:Create_user_priv	Event_priv:Event_priv	Trigger_priv:Trigger_priv	Create_tablespace_priv:Create_tablespace_priv	ssl_type:ssl_type	ssl_cipher:ssl_cipher	x509_issuer:x509_issuer	x509_subject:x509_subject	max_questions:max_questions	max_updates:max_updates	max_connections:max_connections	max_user_connections:max_user_connections	plugin:plugin	authentication_string:authentication_string
    *@return error_id:1-03-01-0005 校验失败 1-03-01-0007 获取失败
    */
    public function info(){
        $model=new \app\user\model\User();
        $Fields=$model->getTableFields();
        $data=\think\facade\Request::only($Fields);
        /**
        *$validate = new \app\user\validate\User();
        *$validate->scene('info');
        *$result = $validate->batch(true)->check($data);
        */
        if (!$data) {
            $msg['msg']='必须有参数';
            $msg['error_id']='1-03-01-0005';
            return $this->errorJson($msg);
        }
        $model=new \app\user\model\User();
        $info = $model->where($data)->find();
        if($info){
            $msg['msg']='获取成功';
            $msg['data']=$info;
            return $this->successJson($msg);
        }else{

            $msg['msg']='获取失败';
            $msg['error_id']='1-03-01-0007';
            return $this->errorJson($msg);
        }
    }
		
	/**
	* @title 查询列表用户信息
	* @description 查询列表用户信息
	* @author 颜东淦
	* @url /user/user/get_list
	* @method *
	* @param name:token require:1 default: desc:token
	* @param name:page require:1 default: desc:第几页
	* @param name:pagesize require:1 default: desc:每页数
	* @return list:用户信息@
	* @list 	Host:Host	User:User	Password:Password	Select_priv:Select_priv	Insert_priv:Insert_priv	Update_priv:Update_priv	Delete_priv:Delete_priv	Create_priv:Create_priv	Drop_priv:Drop_priv	Reload_priv:Reload_priv	Shutdown_priv:Shutdown_priv	Process_priv:Process_priv	File_priv:File_priv	Grant_priv:Grant_priv	References_priv:References_priv	Index_priv:Index_priv	Alter_priv:Alter_priv	Show_db_priv:Show_db_priv	Super_priv:Super_priv	Create_tmp_table_priv:Create_tmp_table_priv	Lock_tables_priv:Lock_tables_priv	Execute_priv:Execute_priv	Repl_slave_priv:Repl_slave_priv	Repl_client_priv:Repl_client_priv	Create_view_priv:Create_view_priv	Show_view_priv:Show_view_priv	Create_routine_priv:Create_routine_priv	Alter_routine_priv:Alter_routine_priv	Create_user_priv:Create_user_priv	Event_priv:Event_priv	Trigger_priv:Trigger_priv	Create_tablespace_priv:Create_tablespace_priv	ssl_type:ssl_type	ssl_cipher:ssl_cipher	x509_issuer:x509_issuer	x509_subject:x509_subject	max_questions:max_questions	max_updates:max_updates	max_connections:max_connections	max_user_connections:max_user_connections	plugin:plugin	authentication_string:authentication_string
	*@return error_id:1-03-01-0006 校验失败
	*/
	public function get_list(){
		$model=new \app\user\model\User();
		$Fields=$model->getTableFields();
		$data=\think\facade\Request::only($Fields);
		/**
		*$validate = new \app\user\validate\User();
		*$validate->scene('lists');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-03-01-0006';
		*return $this->errorJson($msg);
		*}
		**/
		$list = $model->where($data)->order('id desc')->paginate();
		$msg['list']=$list;
		return $this->successJson($msg);
	}
}

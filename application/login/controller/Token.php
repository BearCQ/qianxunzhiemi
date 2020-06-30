<?php
//自动生成,请根据需要修改
namespace app\login\controller;
use app\common\controller\Base;
/**
* @title token页面（模块04-01）
* @description token说明
* @group 登录（04）
* @header name:model_id require:0 default:04-01 desc:模块
* @groupremark 已使用错误码：1-04-01-0001 校验失败 1-04-01-0002 添加失败 1-04-01-0003 编辑校验失败 1-04-01-0004 编辑失败 1-04-01-0005 获取详情失败  1-04-01-0006 获取列表失败 1-04-01-0007获取单个详情失败 1-04-01-0008 删除失败
*/
class Token extends Base{
		//测试
	public function test(){
		return 'test 111';
	}

	/**
	* @title 添加token
	* @description 添加token
	* @author 颜东淦
	* @url /login/token/add
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
	*@return data:token@!
	* @data
	*@return error_id:1-04-01-0001 校验失败  1-04-01-0002 添加失败
	*/
	public function add(){
		$data=input();
		/**
		*$validate = new \app\login\validate\Token();
		*$validate->scene('add');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-04-01-0001';
		*return $this->errorJson($msg);
		*}
		**/
		$model=new \app\login\model\Token();
		$flag = $model->save($data);
		if($flag){
			$msg['msg']='添加成功';
			$msg['data']=$model->get($model['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-04-01-0002';
			$msg['msg']='添加失败';
			return $this->errorJson($msg);
		}
	}
		/**
	* @title 编辑token
	* @description 编辑token
	* @author 颜东淦
	* @url /login/token/edit
	* @method *
	*
	* @header name:token require:1 default: desc:token
	*
		*@return data:token@!
	* @data
	*@return error_id:1-04-01-0003 校验失败 1-04-01-0004 修改失败
	*/
	public function edit(){
		$data=input();
		$validate = new \app\login\validate\Token();
		$validate->scene('edit');
		$result = $validate->batch(true)->check($data);
		if ($result !== true) {
			$msg['msg']='校验失败';
			$msg['validate']=$validate->getError();
			$msg['error_id']='1-04-01-0003';
			return $this->errorJson($msg);
		}
		$model=new \app\login\model\Token();
		$flag = $model->edit($data);
		if($flag!==false){
			$msg['msg']='修改成功';
			$msg['data']=$model->get($data['id']);
			return $this->successJson($msg);
		}else{
			$msg['error_id']='1-04-01-0004';
			$msg['msg']='修改失败';
			return $this->errorJson($msg);
		}
	}

	/**
	* @title 删除token
	* @description 删除token
	* @author 颜东淦
	* @url /login/token/delete
	* @method *
	*
	* @param name:token require:1 default: desc:token
	*
	* @param name:id type:int|array require:1 other: desc:要删除的id
	*@return error_id:1-04-01-0008 删除失败
	*/
	public function delete(){
		$id=input('id');
		$model=new \app\login\model\Token();
		$flag = $model->destroy($id);
		if($flag){
			$msg['msg']='删除成功';
			return $this->successJson($msg);
		}else{
			$msg['msg']='删除失败';
			$msg['error_id']='1-04-01-0008';
			return $this->errorJson($msg);
		}
	}

    /**
    * @title 单个查询token
    * @description 单个查询token
    * @author 颜东淦
    * @url /login/token/info
    * @method *
    *
    * @param name:token require:1 default: desc:token
    *
        *@return data:token@!
    * @data
    *@return error_id:1-04-01-0005 校验失败 1-04-01-0007 获取失败
    */
    public function info(){
        $model=new \app\login\model\Token();
        $Fields=$model->getTableFields();
        $data=\think\facade\Request::only($Fields);
        /**
        *$validate = new \app\login\validate\Token();
        *$validate->scene('info');
        *$result = $validate->batch(true)->check($data);
        */
        if (!$data) {
            $msg['msg']='必须有参数';
            $msg['error_id']='1-04-01-0005';
            return $this->errorJson($msg);
        }
        $model=new \app\login\model\Token();
        $info = $model->where($data)->find();
        if($info){
            $msg['msg']='获取成功';
            $msg['data']=$info;
            return $this->successJson($msg);
        }else{

            $msg['msg']='获取失败';
            $msg['error_id']='1-04-01-0007';
            return $this->errorJson($msg);
        }
    }

	/**
	* @title 查询列表token
	* @description 查询列表token
	* @author 颜东淦
	* @url /login/token/get_list
	* @method *
	* @param name:token require:1 default: desc:token
	* @param name:page require:1 default: desc:第几页
	* @param name:pagesize require:1 default: desc:每页数
	* @return list:token@
	* @list
	*@return error_id:1-04-01-0006 校验失败
	*/
	public function get_list(){
		$model=new \app\login\model\Token();
		$Fields=$model->getTableFields();
		$data=\think\facade\Request::only($Fields);
		/**
		*$validate = new \app\login\validate\Token();
		*$validate->scene('lists');
		*$result = $validate->batch(true)->check($data);
		*if ($result !== true) {
		*$msg['msg']='校验失败';
		*$msg['validate']=$validate->getError();
		*$msg['error_id']='1-04-01-0006';
		*return $this->errorJson($msg);
		*}
		**/
		$list = $model->where($data)->order('id desc')->paginate();
		$msg['list']=$list;
		return $this->successJson($msg);
	}
}

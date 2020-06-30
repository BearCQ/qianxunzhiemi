<?php

namespace app\generate\controller;

use think\Controller;
use think\Db;
use app\generate\controller\Base;

/**
 * @title PHP代码生成（01-01）
 * @description 生成控制器、模型、校验
 * @group 接口分组（01）
 * @header name:key require:1 default: desc:秘钥(区别设置)
 * @param name:public type:int require:1 default:1 other: desc:公共参数(区别设置)
 */
class Api extends Controller
{

    /**
     * @title 获取数据库列表
     * @description 获取数据库列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_db
     **/
    public function get_db(){
        $generate_model=new \app\generate\model\Api();
        $data = $generate_model->get_db_list();
        if (count($data) === 0){
            $data['msg'] = '获取失败！';
            return $this->errorJson($data);
        }

        $res = [];

        foreach ($data as $key=>$value){
            $temp['db_name'] = $value['SCHEMA_NAME'];
            foreach ($value['table'] as $k=>$v){
                $temp['table_name'] = $v['TABLE_NAME'];
                $temp['table_desc'] = $v['TABLE_COMMENT'];
                array_push($res,$temp);
            }
        }


        $msg['data'] = $res;
        $data['msg'] = '获取成功！';
        return $this->successJson($msg);
    }

    /**
     * @title 获取数据表的列表
     * @description 获取数据表列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_table
     *
     * @header name:db_name require:1 default: desc:数据表名
     **/
    public function get_table(){
        $db_name = input('db_name');
        if(empty($db_name)){
            $data['msg']='表名不能为空';
            return $this->errorJson($data);
        }
        $generate_model=new \app\generate\model\Api();
        $data = $generate_model->get_db_table_list(htmlspecialchars($db_name));
        $msg['data'] = $data;
        $data['msg'] = '获取成功！';
        return $this->successJson($msg);
    }
    /**
     * @title 获取数据表信息
     * @description 获取数据表信息
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_table_info
     *
     * @header name:id require:1 default: desc:数据表ID
     **/
    public function get_table_info(){
        $input = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }
        $generate_model=new \app\generate\model\Api();
        $data = $generate_model->get_table_info($input['id']);
        $msg['data'] = $data;
        $data['msg'] = '获取成功！';
        return $this->successJson($msg);
    }
    /**
     * @title 获取基础数据
     * @description 获取基础数据
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_base_data
     **/
    public function get_base_data(){
        $generate_model=new \app\generate\model\Api();
        $data = $generate_model->get_base_data();

        $msg['data'] = $data;
        $msg['msg'] = '获取成功！';
        return $this->successJson($msg);

    }
    /**
     * @title 获取分组列表
     * @description 获取分组列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_group_list
     **/
    public function get_group_list(){
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_group_list();
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 添加分组
     * @description 添加分组
     * @author 开发者（宋晓文）
     * @url /generate/Api/add_group
     **/
    public function add_group(){
        $data = input();
        $rule = [
            'name' => ['require']
        ];
        $vmsg = [
            'name.require' => '不能为空'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $add_data = [
            'name' => $data['name']
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->add_group($add_data);
        if ($res){
            $msg['msg'] = '添加分组成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '添加分组失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 删除分组
     * @description 删除分组
     * @author 开发者（宋晓文）
     * @url /generate/Api/del_group
     **/
    public function del_group(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $id = $data['id'];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->del_group($id);
        if ($res){
            $msg['msg'] = '删除分组成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '删除分组失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 获取负责人列表
     * @description 获取负责人列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_person_list
     **/
    public function get_person_list(){
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_person_list();
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 添加负责人
     * @description 添加负责人
     * @author 开发者（宋晓文）
     * @url /generate/Api/add_person
     **/
    public function add_person(){
        $data = input();
        $rule = [
            'name' => ['require']
        ];
        $vmsg = [
            'name.require' => '不能为空'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $add_data = [
            'name' => $data['name']
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->add_person($add_data);
        if ($res){
            $msg['msg'] = '添加成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '添加失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 删除负责人
     * @description 删除负责人
     * @author 开发者（宋晓文）
     * @url /generate/Api/del_person
     **/
    public function del_person(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $id = $data['id'];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->del_person($id);
        if ($res){
            $msg['msg'] = '删除成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '删除失败！';
            return $this->errorJson($msg);
        }
    }

    /**
     * @title 获取模型列表
     * @description 获取模型列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_model_list
     **/
    public function get_model_list(){
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_model_list();
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 添加模型
     * @description 添加模型
     * @author 开发者（宋晓文）
     * @url /generate/Api/add_model
     **/
    public function add_model(){
        $data = input();
        $rule = [
            'db_name' => ['require'],
            'model_name' => ['require'],
        ];
        $vmsg = [
            'require' => '不能为空'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();

        $add_datebase = [
            'db_name'=> 'zb_'.strtolower($data['db_name']),
            'character_set' => 'utf8',
            'collation' => 'utf8_general_ci'
        ];
        $generate_model->create_database($add_datebase);


        $add_data = [
            'model_name' => $data['model_name'],
            'db_name' => strtolower($data['db_name']),
            'model_namespace' => 'app\\'.strtolower($data['db_name']).'\controller'
        ];

        $res = $generate_model->add_model($add_data);
        if ($res){
            $msg['msg'] = '添加成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '添加失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 删除模型
     * @description 删除模型
     * @author 开发者（宋晓文）
     * @url /generate/Api/del_model
     **/
    public function del_model(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $id = $data['id'];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->del_model($id);
        if ($res){
            $msg['msg'] = '删除成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '删除失败！';
            return $this->errorJson($msg);
        }
    }

    /**
     * @title 获取数据表列表
     * @description 获取负责人列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_table_list
     **/
    public function get_table_list(){
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_table_list();
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 获取数据表列表（包括字段）
     * @description 获取负责人列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_table_list_all
     **/
    public function get_table_list_all(){
        $input = input();
        $rule = [
            'model_id' => ['require','number'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_table_list_all($input['model_id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 添加数据表
     * @description 添加数据表
     * @author 开发者（宋晓文）
     * @url /generate/Api/add_table
     **/
    public function add_table(){
        $input = input();

        $rule = [
            'group_id' => ['require'],
            'model_id' => ['require'],
            'table_title' => ['require'],
            'engine' => ['require'],
            'person_id' => ['require'],
            'table_name' => ['require'],
            'field' => ['require']
        ];
        $vmsg = [
            'require' => '不能为空'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $table_table = [
            'group_id' => $input['group_id'],
            'model_id' => $input['model_id'],
            'person_id' => $input['person_id'],
            'table_prefix' => "tp_",
            'table_name' => $input['table_name'],
            'engine' => $input['engine'],
            'table_title' => $input['table_title']
        ];
        $field_data = json_decode($input['field'],true);

        $generate_model = new \app\generate\model\Api();
        $res = $generate_model->create_table($table_table,$field_data);
        if (!$res){
            $msg['msg'] = '数据表创建失败！';
            return $this->errorJson($msg);
        }
        $res = $generate_model->add_table($table_table,$field_data);
        if (!$res){
            $msg['msg'] = '数据添加失败！';
            return $this->errorJson($msg);
        }

        $msg['msg'] = '添加并创建成功！';
        $msg['data'] = $res;
        return $this->successJson($msg);
    }
    /**
     * @title 删除数据表
     * @description 删除数据表
     * @author 开发者（宋晓文）
     * @url /generate/Api/del_table
     **/
    public function del_table(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $id = $data['id'];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->del_table($id);
        $generate_model->del_field($id);
        if ($res){
            $msg['msg'] = '删除成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '删除失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 删除字段
     * @description 删除字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/delete_field
     **/
    public function delete_field(){
        $input = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }
        $field = Db::table('zb_generate.tp_field')->find($input['id']);
        $table = Db::table('zb_generate.tp_table')->find($field['table_id']);
        $model = Db::table('zb_generate.tp_model')->find($table['model_id']);

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->alter_table_drop('zb_'.$model['db_name'],$table['table_prefix'].$table['table_name'],$field['name']);
        if (!$res){
            $msg['msg'] = '删除失败！';
            return $this->errorJson($msg);
        }
        $f_res = Db::table('zb_generate.tp_field')->delete($input['id']);
        $v_f_res = Db::table('zb_generate.tp_validate_field')->where('field_id','=',$input['id'])->delete();

        if (!$f_res){
            $msg['msg'] = '删除失败！';
            return $this->errorJson($msg);
        }
        $msg['msg'] = '删除成功！';
        return $this->successJson($msg);
    }
    /**
     * @title 添加字段
     * @description 添加字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/alter_table_add
     **/
    public function alter_table_add(){
        $input = input();
        $rule = [
            'table_id' => ['require','number'],
            'comment' => ['require'],
            'name' => ['require'],
            'type' => ['require'],
            'length' => ['require'],
            'default' => ['require'],
            'not_null' => ['require'],
            'enum' => ['require']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=dump($validate->getError());
            return $this->errorJson($msg);
        }
        $field = [
            'table_id' => $input['table_id'],
            'comment' => $input['comment'],
            'name' => $input['name'],
            'type' => $input['type'],
            'length' => $input['length'],
            'default' => $input['default'],
            'not_null' => $input['not_null'],
            'enum' => $input['enum']
        ];
        $table = Db::table('zb_generate.tp_table')->find($input['table_id']);
        $model = Db::table('zb_generate.tp_model')->find($table['model_id']);

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->alter_table_add('zb_'.$model['db_name'],$table['table_prefix'].$table['table_name'],$field);

        if (!$res){
            $msg['msg'] = '数据库创建字段失败！';
            return $this->errorJson($msg);
        }
        $f_res = Db::table('zb_generate.tp_field')->insert($field);

        if (!$f_res){
            $msg['msg'] = '添加失败！';
            return $this->errorJson($msg);
        }
        $msg['msg'] = '添加成功！';
        return $this->successJson($msg);
    }

    /**
     * @title 根据 table_id 获取字段
     * @description 根据 table_id 获取字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_field_list
     **/
    public function get_field_list(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_field_list(['table_id'=>$data['id']]);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 获取验证器基本信息
     * @description 获取验证器基本信息
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_validate_base
     **/
    public function get_validate_base(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_validate_base($data['id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 根据 table_id 自动添加验证字段（一键添加）
     * @description 根据 table_id 自动添加验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/auto_insert_validate
     **/
    public function auto_insert_validate(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->auto_insert_validate($data['id']);
        if ($res){
            $msg['msg'] = '添加成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '添加成功！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 根据 field_id 获取验证字段的规则
     * @description 根据 field_id 获取验证字段的规则
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_v_field
     **/
    public function get_v_field(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_v_field($data['id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 根据 table_id 获取验证字段
     * @description 根据 table_id 获取验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_v_field_list
     **/
    public function get_v_field_list(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'id.require' => '不能为空',
            'id.number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_v_field_list($data['id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 根据 table_id 获取验证字段
     * @description 根据 table_id 获取验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/add_validate_field
     **/
    public function add_validate_field(){

        $data = input();
        $rule = [
            'table_id' => ['require','number'],
            'field_id' => ['require','number'],
            'validate' => ['require'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $add_data=[
            'table_id' => $data['table_id'],
            'field_id' => $data['field_id'],
            'validate' => $data['validate']
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->add_validate_field($add_data);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 根据id删除验证字段
     * @description 根据id删除验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/del_validate_field
     **/
    public function del_validate_field(){
        $data = input();
        $rule = [
            'id' => ['require','number'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->del_validate_field($data['id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '删除成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '删除失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 修改验证字段
     * @description 修改验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/edit_validate_field
     **/
    public function edit_validate_field(){
        $data = input();
        $rule = [
            'id' => ['require','number'],
            'validate' => ['require'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $edit_data=[
            'id' => $data['id'],
            'validate' => $data['validate']
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->edit_validate_field($edit_data);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '修改成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '修改失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 根据table_id验证场景
     * @description 根据table_id验证场景
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_validate_scene
     **/
    public function get_validate_scene(){
        $data = input();
        $rule = [
            'table_id' => ['require','number']
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_validate_scene($data['table_id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 根据table_id验证场景完整信息
     * @description 根据table_id验证场景完整信息
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_validate_scene_all_data
     **/
    public function get_validate_scene_all_data(){
        $data = input();
        $rule = [
            'table_id' => ['require','number']
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_validate_scene_all_data($data['table_id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 修改验证字段
     * @description 修改验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/edit_validate_scene
     **/
    public function edit_validate_scene(){
        $data = input();

        $rule = [
            'id' => ['require','number'],
            'name' => ['require'],
            'v_field_id' => ['require'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $edit_data=[
            'id' => $data['id'],
            'name' => $data['name'],
            'v_field_id' => $data['v_field_id']
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->edit_validate_scene($edit_data);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '修改成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '修改失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 删除验证字段
     * @description 删除验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/del_validate_scene
     **/
    public function del_validate_scene(){
        $data = input();
        $rule = [
            'id' => ['require','number']
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->del_validate_scene($data['id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '修改成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '修改失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 添加验证字段
     * @description 添加验证字段
     * @author 开发者（宋晓文）
     * @url /generate/Api/add_validate_scene
     **/
    public function add_validate_scene(){
        $input = input();
        $rule = [
            'table_id' => ['require','number'],
            'name' => ['require'],
            'v_field_id' => ['require'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $data=[
            'table_id' => $input['table_id'],
            'name' => $input['name'],
            'v_field_id' => $input['v_field_id']
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->add_validate_scene($data);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '修改成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '修改失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 添加接口和方法
     * @description 添加接口和方法
     * @author 开发者（宋晓文）
     * @url /generate/Api/add_function_data
     **/
    public function add_function_data(){
        $input = input();
        $rule = [
            'table_id' => ['require','number'],
            'function_title' => ['require'],
            'function_desc' => ['require'],
            'person_name' => ['require'],
            'function_name' => ['require'],
            'method_type' => ['require'],
            'function_data' => ['require'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $data=[
            'table_id' => $input['table_id'],
            'function_title' => $input['function_title'],
            'function_desc' => $input['function_desc'],
            'person_name' => $input['person_name'],
            'function_name' => $input['function_name'],
            'method_type' => $input['method_type'],
            'function_data' => $input['function_data'],
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->add_function_data($data);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '添加成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '添加失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 修改接口和方法
     * @description 修改接口和方法
     * @author 开发者（宋晓文）
     * @url /generate/Api/edit_function_data
     **/
    public function edit_function_data(){
        $input = input();
        $rule = [
            'id' => ['require','number'],
            'function_title' => ['require'],
            'function_desc' => ['require'],
            'person_name' => ['require'],
            'function_name' => ['require'],
            'method_type' => ['require'],
            'function_data' => ['require'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $data=[
            'function_title' => $input['function_title'],
            'function_desc' => $input['function_desc'],
            'person_name' => $input['person_name'],
            'function_name' => $input['function_name'],
            'method_type' => $input['method_type'],
            'function_data' => $input['function_data'],
        ];
        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->edit_function_data($input['id'],$data);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '添加成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '添加失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 获取接口和方法的列表
     * @description 获取接口和方法的列表
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_function_list
     **/
    public function get_function_list(){
        $input = input();
        $rule = [
            'table_id' => ['require','number'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_function_list($input['table_id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '修改成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '修改失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 获取接口和方法
     * @description 获取接口和方法
     * @author 开发者（宋晓文）
     * @url /generate/Api/get_function
     **/
    public function get_function(){
        $input = input();
        $rule = [
            'id' => ['require','number'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->get_function($input['id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '获取成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '获取失败！';
            return $this->errorJson($msg);
        }
    }
    /**
     * @title 删除接口和方法
     * @description 删除接口和方法
     * @author 开发者（宋晓文）
     * @url /generate/Api/del_function
     **/
    public function del_function(){
        $input = input();
        $rule = [
            'id' => ['require','number'],
        ];
        $vmsg = [
            'require' => '不能为空',
            'number' => '必须是数字'
        ];
        $validate = new \think\Validate($rule,$vmsg);
        $result = $validate->batch()->check($input);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            return $this->errorJson($msg);
        }

        $generate_model=new \app\generate\model\Api();
        $res = $generate_model->del_function($input['id']);
        if ($res){
            $msg['data'] = $res;
            $msg['msg'] = '删除成功！';
            return $this->successJson($msg);
        }else{
            $msg['msg'] = '删除失败！';
            return $this->errorJson($msg);
        }
    }





    function successJson($data)
    {
        $default = array(
            "status" => true,
            "msg" => "成功",
//        "callback"=>"",
//        "wait"=>0,
        );

        $data = array_merge($default, $data);
        return json($data);
    }

    function errorJson($data)
    {
        $default = array(
            "status" => false,
            "msg" => "失败",
//        "url"=>"",
//        "callback"=>"",
//        "wait"=>0,
        );
        $data = array_merge($default, $data);
        return json($data);
    }
}

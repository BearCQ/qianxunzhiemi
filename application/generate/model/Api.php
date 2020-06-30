<?php
/**
 * Created by PhpStorm.
 * User: zanboon-201
 * Date: 2019/3/20
 * Time: 9:44
 */

namespace app\generate\model;
use think\Db;
use think\exception\PDOException;
use think\Model;
use think\facade\Config;


class Api extends Model
{
    //获取数据库列表
    public function get_db_list(){
        return Db::table('information_schema.SCHEMATA')
            ->where([
                ['SCHEMA_NAME','<>','mysql'],
                ['SCHEMA_NAME','<>','information_schema'],
                ['SCHEMA_NAME','<>','test'],
                ['SCHEMA_NAME','<>','zb_generate']
            ])
            ->withAttr('table', function($value, $data) {
                return Db::table('information_schema.tables')
                    ->where('table_schema','=',$data['SCHEMA_NAME'])
                    ->field('TABLE_NAME,TABLE_COMMENT')
                    ->select();
            })
            ->select();
    }
    //获取数据表列表
    public function get_db_table_list($db_name){
        return Db::table('information_schema.tables')->where('table_schema','=',$db_name)->select();
    }
    //添加数据库
    public function create_database($data){
        $sql_query = 'CREATE DATABASE IF NOT EXISTS '.$data['db_name'].' character set '.$data['character_set'].' COLLATE '.$data['collation'];
        return Db::query($sql_query);
    }

    //获取分组列表
    public function get_group_list(){
        return Db::table('zb_generate.tp_group')->select();
    }
    //添加分组
    public function add_group($data){
        return Db::table('zb_generate.tp_group')->insert($data);
    }
    //删除分组
    public function del_group($id){
        return Db::table('zb_generate.tp_group')->delete($id);
    }

    //获取负责人列表
    public function get_person_list(){
        return Db::table('zb_generate.tp_person')->select();
    }
    //添加负责人
    public function add_person($data){
        return Db::table('zb_generate.tp_person')->insert($data);
    }
    //删除负责人
    public function del_person($id){
        return Db::table('zb_generate.tp_person')->delete($id);
    }

    //获取模型列表
    public function get_model_list(){
        return Db::table('zb_generate.tp_model')->select();
    }
    //添加模型
    public function add_model($data){
        return Db::table('zb_generate.tp_model')->insert($data);
    }
    //删除模型
    public function del_model($id){
        return Db::table('zb_generate.tp_model')->delete($id);
    }

    //获取数据表列表
    public function get_table_list(){

        return Db::table('zb_generate.tp_table')->select();
    }
    //获取数据表列表
    public function get_table_list_all($model_id){
        $table = Db::table('zb_generate.tp_table')->where('model_id','=',$model_id)->select();
        foreach ($table as $k=>$v){
            $field = Db::table('zb_generate.tp_field')->where('table_id','=',$v['id'])->select();
            foreach ($field as $key=>$value){
                $field[$key]['enum'] = json_decode($value['enum'],true);
            }
            $table[$k]['field'] = $field;
        }
        return $table;
    }
    //添加数据表
    public function add_table($data,$field){
        $table = Db::table('zb_generate.tp_table')->insertGetId($data);

        if ($table){
            foreach ($field as $k=>$v){
                $field[$k]['table_id'] = $table;
                $field[$k]['enum'] = json_encode($v['enum']);
                Db::table('zb_generate.tp_field')->insertGetId($field[$k]);
            }
        }
        return $table;
    }
    //删除数据表
    public function del_table($table_id){
        $database = Config::get('database.');
        try{
            $table = Db::table('zb_generate.tp_table')->find($table_id);
            $model = Db::table('zb_generate.tp_model')->find($table['model_id']);
            $dbh  = new  \PDO( 'mysql:host='.$database['hostname'].';dbname=zb_'.$model['db_name'],$database['username'],$database['password'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
            $query = "DROP TABLE `".$table['table_prefix'].$table['table_name']."`";
            $dbh->query($query);
            Db::table('zb_generate.tp_table')->delete($table_id);
            Db::table('zb_generate.tp_validate_field')->where('table_id','=',$table_id)->delete();
            Db::table('zb_generate.tp_validate_scene')->where('table_id','=',$table_id)->delete();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    //创建数据表
    public function create_table($data,$field){
        $model = Db::table('zb_generate.tp_model')->find($data['model_id']);
        if (!$model){
            return false;
        }
        $database = Config::get('database.');

        try{
            $dbh  = new  \PDO( 'mysql:host='.$database['hostname'].';dbname=zb_'.$model['db_name'],$database['username'],$database['password'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));

            $query = "CREATE TABLE IF NOT EXISTS `".$data['table_prefix'].$data['table_name']."` (";
            foreach ($field as $k => $v){
                $query .= "`".$v['name']."` ".strtolower($v['type']);

                $type = strtolower($v['type']);
                if($type === "varchar" || $type === "int" || $type === "tinyint"){
                    $query .= "(".$v['length'].")";
                }
                if ($type === "enum"){
                    if(empty($v['length'])){
                        return false;
                    }
                    $query .= "('".str_replace(",","','",$v['length'])."')";
                }
                if ($v['not_null']=='1'){
                    $query .= " NOT NULL";
                }
                if($type !== "text"){
                    if ($v['default'] == 'AUTO_INCREMENT'){
                        $query .= " ".$v['default'];
                    }else{
                        $query .= " DEFAULT '".$v['default']."'";
                    }
                }

                $query .= " COMMENT '".$v['comment'];
                if (!empty($v['enum'])){
                    $query .="（";
                    foreach ($v['enum'] as $key => $value){
                        $query .=$value['key']."-".$value['name']."；";
                    }
                    $query .="）";
                }
                $query .= "',";
            }
            $query .= "PRIMARY KEY (`id`)";
            $query .= ") ENGINE=".$data['engine']." AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='".$data['table_title']."';";

            $temp=array();
            foreach ($dbh->query($query) as $row) {
                array_push($temp,$row);
            }
            return true;

        } catch (PDOException $e) {
            return false;
        }

    }

    //获取table信息
    public function get_table_info($table_id){
        return Db::table('zb_generate.tp_table')->find($table_id);
    }

    //数据表删除列
    public function alter_table_drop($db_mame,$table_name,$field_name){
        $database = Config::get('database.');
        try{
            $dbh  = new  \PDO( 'mysql:host='.$database['hostname'].';dbname='.$db_mame,$database['username'],$database['password'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
            $query = "ALTER TABLE ".$table_name." DROP ".$field_name;
            $dbh->query($query);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    //数据表添加列
    public function alter_table_add($db_mame,$table_name,$field){
        $database = Config::get('database.');
        try{
            $dbh  = new  \PDO( 'mysql:host='.$database['hostname'].';dbname='.$db_mame,$database['username'],$database['password'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
            $query = "ALTER TABLE ".$table_name." ADD ".$field['name'];

            $query .= " ".strtolower($field['type']);

            $type = strtolower($field['type']);
            if($type === "varchar" || $type === "int" || $type === "tinyint"){
                $query .= "(".$field['length'].")";
            }
            if ($type === "enum"){
                if(empty($field['length'])){
                    return false;
                }
                $query .= "('".str_replace(",","','",$field['length'])."')";
            }
            if ($field['not_null']=='1'){
                $query .= " NOT NULL";
            }
            if($type !== "text"){
                if ($field['default'] == 'AUTO_INCREMENT'){
                    $query .= " ".$field['default'];
                }else{
                    $query .= " DEFAULT '".$field['default']."'";
                }
            }

            $query .= " COMMENT '".$field['comment'];
            $enum = json_decode ($field['enum'],true);
            if (!empty($enum)){
                $query .="（";
                foreach ($enum as $key => $value){
                    $query .=$value['key']."-".$value['name']."；";
                }
                $query .="）";
            }
            $query .="'";

            $dbh->query($query);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    //数据表添加列
    public function alter_table_change($db_name,$table_name,$field){
        $database = Config::get('database.');
        try{
            $dbh  = new  \PDO( 'mysql:host='.$database['hostname'].';dbname='.$db_name,$database['username'],$database['password'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
            $query = "ALTER TABLE ".$table_name." CHANGE ".$field['old_name']." ".$field['name'];

            $query .= " ".strtolower($field['type']);

            $type = strtolower($field['type']);
            if($type === "varchar" || $type === "int" || $type === "tinyint"){
                $query .= "(".$field['length'].")";
            }
            if ($type === "enum"){
                if(empty($field['length'])){
                    return false;
                }
                $query .= "('".str_replace(",","','",$field['length'])."')";
            }
            if ($field['not_null']=='1'){
                $query .= " NOT NULL";
            }
            if($type !== "text"){
                if ($field['default'] == 'AUTO_INCREMENT'){
                    $query .= " ".$field['default'];
                }else{
                    $query .= " DEFAULT '".$field['default']."'";
                }
            }

            $query .= " COMMENT '".$field['comment'];
            if (!empty($v['enum'])){
                $query .="（";
                foreach ($v['enum'] as $key => $value){
                    $query .=$value['key']."-".$value['name']."；";
                }
                $query .="）";
            }

            $dbh->query($query);
            return $query;
        } catch (PDOException $e) {
            return false;
        }
    }

    //重命名数据表
    public function alter_table_rename($db_mame,$table_name,$new_table_name){
        $database = Config::get('database.');
        try{
            $dbh  = new  \PDO( 'mysql:host='.$database['hostname'].';dbname='.$db_mame,$database['username'],$database['password'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
            $query = "ALTER TABLE ".$table_name." RENAME ".$new_table_name;
            $dbh->query($query);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }



    //获取基础数据
    public function get_base_data(){
        $group = Db::table('zb_generate.tp_group')->select();
        $model = Db::table('zb_generate.tp_model')->select();
        $person = Db::table('zb_generate.tp_person')->select();
        $table = Db::table('zb_generate.tp_table')->select();

        $table_data = array();
        foreach ($table as $k => $v){
            $temp = [];
            foreach ($group as $g_k => $g_v){
                if ($v['group_id'] === $g_v['id']){
                    $temp['group_name'] = $g_v['name'];
                    break;
                }
            }
            foreach ($model as $m_k => $m_v){
                if ($v['model_id'] === $m_v['id']){
                    $temp['model_name'] = $m_v['model_name'];
                    $temp['db_name'] = $m_v['db_name'];
                    $temp['model_namespace'] = $m_v['model_namespace'];
                    break;
                }
            }
            foreach ($person as $p_k => $p_v){
                if ($v['person_id'] === $p_v['id']){
                    $temp['person_name'] = $p_v['name'];
                    break;
                }
            }
            $temp['id'] = $v['id'];
            $temp['table_name'] = $v['table_name'];
            $temp['table_title'] = $v['table_title'];
            $table_data[$k]=$temp;
        }
        return $table_data;
    }

    //获取字段信息
    public function get_field_list($where){
        $table = Db::table('zb_generate.tp_table')->select();
        if (empty($where)){
            $field = Db::table('zb_generate.tp_field')->select();
        }else{
            $field = Db::table('zb_generate.tp_field')->where($where)->select();
        }
        foreach ($field as $k=>$v){
            $field[$k]['enum'] = json_decode($v['enum'],true);
            foreach ($table as $t_k=>$t_v){
                if ($v['table_id'] == $t_v['id']){
                    $field[$k]['table_prefix'] = $t_v['table_prefix'];
                    $field[$k]['table_name'] = $t_v['table_name'];
                    $field[$k]['table_title'] = $t_v['table_title'];
                    break;
                }
            }
        }
        return $field;
    }
    //删除字段信息
    public function del_field($table_id){
        $field = Db::table('zb_generate.tp_field')->where('table_id','=',$table_id)->delete();
        return $field;
    }
    //获取验证器基本信息
    public function get_validate_base($table_id){
        $table = Db::table('zb_generate.tp_table')->find($table_id);
        $model = Db::table('zb_generate.tp_model')->find($table['model_id']);
        $person = Db::table('zb_generate.tp_person')->find($table['person_id']);
        $group = Db::table('zb_generate.tp_group')->find($table['group_id']);

        $table['person_name']=$person['name'];
        $table['group_name']=$group['name'];
        $table['db_name']=$model['db_name'];
        $table['model_name']=$model['model_name'];
        return $table;
    }
    //根据 table_id 获取字段名，自动添加验证规则
    public function auto_insert_validate($table_id){
        $field = Db::table('zb_generate.tp_field')->where('table_id','=',$table_id)->select();
        $insert_data = [];
        foreach ($field as $k => $v){
            $validate = [
                ['rule'=>'require','value'=>'','msg'=>$v['comment'].'必须']
            ];
            if ($v['type']=='TinyInt'| $v['type']=='Int'){
                array_push($validate,['rule'=>'number','value'=>'','msg'=>$v['comment'].'不是数字']);
            }
            if ($v['enum']!=="[]"){
                $i = 0;
                $value='';
                foreach (json_decode($v['enum'],true) as $enum_k=>$enum_v){
                    if ($i!==0){
                        $value.=",";
                    }
                    $i++;
                    $value.=$enum_v['key'];
                }
                array_push($validate,['rule'=>'in','value'=>$value,'msg'=>$v['comment'].'不在列举中']);
            }
            $data = [
                'table_id'=>$table_id,
                'field_id'=>$v['id'],
                'validate'=>json_encode($validate)
            ];
            array_push($insert_data,$data);
        }
        return Db::table('zb_generate.tp_validate_field')->insertAll($insert_data);

    }
    //根据 field_id 获取验证字段（规则）
    public function get_v_field($field_id){
        $v_field = Db::table('zb_generate.tp_validate_field')->where('field_id','=',$field_id)->find();
        if (!$v_field){
            $data = [
                'field_id'=>$field_id,
                'validate'=>'[]'
            ];
            $v_field_id = Db::table('zb_generate.tp_validate_field')->insertGetId($data);
            $v_field = Db::table('zb_generate.tp_validate_field')->find($v_field_id);
        }
        return $v_field;
    }

    //获取字段及验证信息
    public function get_v_field_list($table_id){
        $table = Db::table('zb_generate.tp_table')->select();
        $field = Db::table('zb_generate.tp_field')->where('table_id','=',$table_id)->select();
        $v_field = Db::table('zb_generate.tp_validate_field')->where('table_id','=',$table_id)->select();
        foreach ($v_field as $v_k=>$v_v){
            foreach ($field as $k=>$v){
                if($v_v['field_id']===$v['id']){
                    $v_field[$v_k]['comment'] = $v['comment'];
                    $v_field[$v_k]['name'] = $v['name'];
                    $v_field[$v_k]['type'] = $v['type'];
                    $v_field[$v_k]['enum'] = json_decode($v['enum'],true);
                    foreach ($table as $t_k=>$t_v){
                        if ($v['table_id'] == $t_v['id']){
                            $v_field[$v_k]['table_prefix'] = $t_v['table_prefix'];
                            $v_field[$v_k]['table_name'] = $t_v['table_name'];
                            $v_field[$v_k]['table_title'] = $t_v['table_title'];
                            break;
                        }
                    }
                    break;
                }
            }
            $v_field[$v_k]['validate'] = json_decode($v_v['validate'],true);
        }
        return $v_field;
    }

    //添加验证字段及规则
    public function add_validate_field($data){
        return Db::table('zb_generate.tp_validate_field')->insert($data);
    }
    //删除验证字段
    public function del_validate_field($id){
        return Db::table('zb_generate.tp_validate_field')->delete($id);
    }
    //删除验证字段
    public function edit_validate_field($data){
        return Db::table('zb_generate.tp_validate_field')->update($data);
    }

    //获取验证场景
    public function get_validate_scene($table_id){
        $scene = Db::table('zb_generate.tp_validate_scene')->where('table_id','=',$table_id)->select();
        foreach ($scene as $k=>$v){
            $scene[$k]['v_field_id']=explode(",",$v['v_field_id']);
            foreach ($scene[$k]['v_field_id'] as $key=>$value){
                $scene[$k]['v_field_id'][$key]=(int)($value);
            }
        }
        return $scene;
    }
    //获取验证场景完整信息
    public function get_validate_scene_all_data($table_id){
        $scene = Db::table('zb_generate.tp_validate_scene')->where('table_id','=',$table_id)->select();
        $v_field = Db::table('zb_generate.tp_validate_field')->where('table_id','=',$table_id)->select();
        $field = Db::table('zb_generate.tp_field')->where('table_id','=',$table_id)->select();
        foreach ($scene as $k=>$v){
            unset($scene[$k]['v_field_id']);
            $v_field_id=explode(",",$v['v_field_id']);
            $validate_list = [];
            foreach ($v_field_id as $key=>$value){

                foreach ($v_field as $v_f_k=>$v_f_v){
                    if ($v_f_v['id']==$value){
                        $temp=array();
                        foreach ($field as $f_k=>$f_v){
                            if ($v_f_v['field_id']==$f_v['id']){
                                $temp['field_name']=$f_v['name'];
                                break;
                            }
                        }
                        $temp['validate_date']=json_decode($v_f_v['validate'],true);
                        array_push($validate_list,$temp);
                        break;
                    }
                }
            }
            $scene[$k]['validate']=$validate_list;

        }
        return $scene;
    }
    //添加验证场景
    public function add_validate_scene($data){
        return Db::table('zb_generate.tp_validate_scene')->insert($data);
    }
    //编辑验证场景
    public function edit_validate_scene($data){
        return Db::table('zb_generate.tp_validate_scene')->update($data);
    }
    //删除验证场景
    public function del_validate_scene($id){
        return Db::table('zb_generate.tp_validate_scene')->delete($id);
    }

    //添加接口和方法
    public function add_function_data($data){
        return Db::table('zb_generate.tp_controller')->insert($data);
    }
    //添加接口和方法
    public function edit_function_data($id,$data){
        return Db::table('zb_generate.tp_controller')->where('id','=',$id)->update($data);
    }
    //获取接口和方法列表
    public function get_function_list($table_id){
        return Db::table('zb_generate.tp_controller')->where('table_id','=',$table_id)->select();
    }
    //获取接口和方法数据
    public function get_function($id){
        $function = Db::table('zb_generate.tp_controller')->find($id);
        $function['function_data'] =json_decode($function['function_data'],true);;
        return $function;
    }
    //删除接口和方法数据
    public function del_function($id){
        $function = Db::table('zb_generate.tp_controller')->delete($id);
        return $function;
    }

    //获取生成代码所需要的数据
    function get_create_data($table_id){
        $table = Db::table('zb_generate.tp_table')->find($table_id);
        $person = Db::table('zb_generate.tp_person')->find($table['person_id']);
        $group = Db::table('zb_generate.tp_group')->find($table['group_id']);
        $model = Db::table('zb_generate.tp_model')->find($table['model_id']);

        $res['table_prefix'] = $table['table_prefix'];
        $res['table_name']=$table['table_name'];
        $res['table_title']=$table['table_title'];
        $res['person_name'] = $person['name'];
        $res['db_name'] = $model['db_name'];
        $res['model_name'] = $model['model_name'];
        $res['model_namespace'] = $model['model_namespace'];
        $res['group_name'] = $group['name'];
        $res['function_list'] = Db::table('zb_generate.tp_controller')->where('table_id','=',$table_id)->select();

        foreach ($res['function_list'] as $k=>$v){
            $res['function_list'][$k]['function_data'] = json_decode($v['function_data'],true);
        }

        return $res;
    }

    //根据table_id获取数据库下所有的方法
    public function get_table_list_by_table_id($table_id){
        $table = Db::table('zb_generate.tp_table')->find($table_id);
        $model = Db::table('zb_generate.tp_model')->find($table['model_id']);
        $table_list = Db::table('zb_generate.tp_table')->where('model_id','=',$table['model_id'])->select();

        $res['db_name'] = $model['db_name'];
        $res['table_list'] = $table_list;

        return $res;
    }





}
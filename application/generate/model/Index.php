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


class Index extends Model
{
    //创建generate的数据库
    public function create_generate_database(){
        try{
            $database = Config::get('database.');
            $dbh  = new  \PDO( 'mysql:host='.$database['hostname'],$database['username'],$database['password'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));

            $query = <<<SQL
        CREATE DATABASE IF NOT EXISTS zb_generate character set utf8 COLLATE utf8_general_ci;
        USE zb_generate;
        CREATE TABLE IF NOT EXISTS `tp_controller` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `table_id` int(11) NOT NULL DEFAULT '0',
          `function_title` varchar(255) NOT NULL DEFAULT '' COMMENT '接口标题',
          `function_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '接口说明',
          `person_name` varchar(255) NOT NULL DEFAULT '' COMMENT '负责人',
          `function_name` varchar(255) NOT NULL DEFAULT '' COMMENT '方法名',
          `method_type` varchar(255) NOT NULL DEFAULT '' COMMENT '表单方法',
          `function_data` text NOT NULL COMMENT '接口和方法（json）',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        
        CREATE TABLE IF NOT EXISTS `tp_field` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `table_id` int(11) NOT NULL DEFAULT '0' COMMENT '表ID',
          `comment` varchar(255) NOT NULL DEFAULT '' COMMENT '备注',
          `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
          `type` varchar(255) NOT NULL DEFAULT 'VarChar' COMMENT '类型',
          `length` varchar(255) NOT NULL DEFAULT '',
          `default` varchar(255) NOT NULL DEFAULT '',
          `not_null` tinyint(3) NOT NULL DEFAULT '1',
          `enum` text NOT NULL COMMENT '枚举注释（json格式）',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        
        CREATE TABLE IF NOT EXISTS `tp_group` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(255) DEFAULT NULL COMMENT '分组名称',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        
        CREATE TABLE IF NOT EXISTS `tp_model` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `db_name` varchar(255) DEFAULT NULL COMMENT '数据库名称',
          `model_name` varchar(255) DEFAULT NULL COMMENT '模块名称',
          `model_namespace` varchar(255) DEFAULT NULL COMMENT '模块命名空间',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        
        CREATE TABLE IF NOT EXISTS `tp_person` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(255) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        
        CREATE TABLE IF NOT EXISTS `tp_table` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '分组ID',
          `model_id` int(11) NOT NULL DEFAULT '0' COMMENT '模型ID',
          `person_id` int(11) NOT NULL DEFAULT '0' COMMENT '负责人ID',
          `table_prefix` varchar(255) NOT NULL DEFAULT 'tp_' COMMENT '前缀',
          `table_name` varchar(255) NOT NULL DEFAULT '' COMMENT '表名称',
          `engine` varchar(255) NOT NULL DEFAULT 'MyISAM' COMMENT '数据库引擎',
          `table_title` varchar(255) NOT NULL DEFAULT '' COMMENT '表名称（中文）',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        
        CREATE TABLE IF NOT EXISTS `tp_validate_field` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `table_id` int(11) NOT NULL DEFAULT '0' COMMENT '表id',
          `field_id` int(11) NOT NULL DEFAULT '0' COMMENT '字段id',
          `validate` text NOT NULL COMMENT '验证器（json）',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
        
        CREATE TABLE IF NOT EXISTS `tp_validate_scene` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `table_id` int(11) NOT NULL DEFAULT '0' COMMENT '表id',
          `name` varchar(255) NOT NULL DEFAULT '' COMMENT '场景名称',
          `v_field_id` varchar(255) NOT NULL DEFAULT '' COMMENT '验证字段id',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

        CREATE DATABASE IF NOT EXISTS zb_login character set utf8 COLLATE utf8_general_ci;
        USE zb_login;
        CREATE TABLE IF NOT EXISTS `tp_token` (
          `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
          `account_type` enum('admin_user','user') DEFAULT 'user' COMMENT '用户类型',
          `account_id` int(11) DEFAULT NULL COMMENT '用户id',
          `token` varchar(50) DEFAULT NULL COMMENT 'token',
          `expires_in` int(11) DEFAULT NULL COMMENT '有效时间',
          `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
          `end_time` int(11) DEFAULT NULL COMMENT '过期时间',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
        INSERT ignore INTO `tp_token` VALUES (1,'admin_user',1,'os2rftxaXgM0vWL1QzOH',NULL,NULL,NULL);

SQL;
            $temp=array();
            foreach ($dbh->query($query) as $row) {
                array_push($temp,$row);
            }
            return true;
        } catch (PDOException $e) {
            return $e;
        }

    }


    //接口一键生成增删改查
    public function auto_create_function($table_id){
        $table = Db::table('zb_generate.tp_table')->find($table_id);
        $person = Db::table('zb_generate.tp_person')->find($table['person_id']);
        $field_list = Db::table('zb_generate.tp_field')->where('table_id','=',$table_id)->select();
        $v_scene_list = $this->create_validate($table_id);

        $data = [
            [
                'table_id'=>$table_id,
                'function_title'=>'插入记录',
                'function_desc'=>'插入'.$table['table_title'].'数据',
                'person_name'=>$person['name'],
                'function_name'=>'add',
                'method_type'=>'post',
                'function_data'=>$this->create_insert_data($table,$field_list,$v_scene_list)
            ],
            [
                'table_id'=>$table_id,
                'function_title'=>'获取列表数据',
                'function_desc'=>'获取'.$table['table_title'].'的列表数据（分页）',
                'person_name'=>$person['name'],
                'function_name'=>'get_list',
                'method_type'=>'*',
                'function_data'=>$this->create_get_list_data($table)
            ],
            [
                'table_id'=>$table_id,
                'function_title'=>'获取单条数据',
                'function_desc'=>'获取'.$table['table_title'].'的指定记录',
                'person_name'=>$person['name'],
                'function_name'=>'info',
                'method_type'=>'*',
                'function_data'=>$this->create_info_data($table,$field_list,$v_scene_list)
            ],
            [
                'table_id'=>$table_id,
                'function_title'=>'更新记录',
                'function_desc'=>'更新'.$table['table_title'].'指定记录的数据',
                'person_name'=>$person['name'],
                'function_name'=>'edit',
                'method_type'=>'post',
                'function_data'=>$this->create_update_data($table,$field_list,$v_scene_list)
            ],
            [
                'table_id'=>$table_id,
                'function_title'=>'删除记录',
                'function_desc'=>'删除'.$table['table_title'].'指定记录的数据',
                'person_name'=>$person['name'],
                'function_name'=>'delete',
                'method_type'=>'post',
                'function_data'=>$this->create_delete_data($table,$field_list,$v_scene_list)
            ],
        ];
        return Db::table('zb_generate.tp_controller')->insertAll($data);
    }

    //创建场景
    public function create_validate($table_id){
        $api_model = new \app\generate\model\Api();
        $api_model->auto_insert_validate($table_id);

        $validate_field_list = $api_model->get_v_field_list($table_id);

        $data = [
            [
                'table_id'=>$table_id,
                'name'=>'all_field',
                'v_field_id'=>''
            ],
            [
                'table_id'=>$table_id,
                'name'=>'except_id',
                'v_field_id'=>''
            ],
            [
                'table_id'=>$table_id,
                'name'=>'only_id',
                'v_field_id'=>''
            ]
        ];
        $temp_all='';
        $temp_except='';
        $temp_id='';
        foreach ($validate_field_list as $k=>$v){
            if ($v['name']=='id'){
                $temp_id=$v['id'];
            }
            if ($v['name']!='id'){
                if ($temp_except!=''){
                    $temp_except.=",";
                }
                $temp_except.=$v['id'];
            }
            if ($temp_all!=''){
                $temp_all.=",";
            }
            $temp_all.=$v['id'];
        }
        $data[0]['v_field_id']=$temp_all;
        $data[1]['v_field_id']=$temp_except;
        $data[2]['v_field_id']=$temp_id;
        Db::table('zb_generate.tp_validate_scene')->insertAll($data);
        return $api_model->get_validate_scene_all_data($table_id);
    }

    //insert的数据生成
    public function create_insert_data($table,$field_list,$v_scene_list){
        $res = [];

        $input= [
            'type'=>'input',
            'return_name'=>'input',
            'data'=>[]
        ];
        foreach ($field_list as $k=>$v){
            if ($v['name'] == 'id'){
                continue;
            }
            $input_data=[
                'is_back'=>true,
                'table_name'=>$table['table_prefix'].$table['table_name'],
                'comment'=>$v['comment'],
                'field_name'=>$v['name'],
                'field_type'=>$v['type'],
                'enum'=>json_decode($v['enum'],true)
            ];
            array_push($input['data'],$input_data);
        }
        array_push($res,$input);

        $validate = [
            'type'=>'validate',
            'input_name'=>'input',
            'return_name'=>'validate',
            'validate'=>[]
        ];
        foreach ($v_scene_list as $k=>$v) {
            if ($v['name']=='except_id'){
                $validate['validate'] = $v;
                break;
            }
        }
        array_push($res,$validate);

        $insert = [
            'type'=>'insert',
            'table_name'=>$table['table_prefix'].$table['table_name'],
            'return_name'=>'insert_res',
            'data'=>[]
        ];
        foreach ($input['data'] as $k=>$v){
            $insert_data=[
                "table_name"=>$table['table_prefix'].$table['table_name'],
                "comment"=>$v['comment'],
                "field_name"=>$v['field_name'],
                "field_type"=>$v['field_type'],
                "root_var_name"=>"input",
                "root_field_name"=>$v['field_name'],
                "enum"=>$v['enum']
            ];
            array_push($insert['data'],$insert_data);
        }
        array_push($res,$insert);

        return json_encode($res);
    }

    //get_list的数据生成
    public function create_get_list_data($table){
        $res = [];

        $select = [
            'type'=>'select',
            'select_type'=>'paginate',
            'table_name'=>$table['table_prefix'].$table['table_name'],
            'alias'=>'',
            'data'=>[],
            'join'=>[],
            'condition'=>[],
            'where'=>[],
            'return_name'=>'select_res',
        ];
        array_push($res,$select);
        return json_encode($res);
    }
    //info的数据生成
    public function create_info_data($table,$field_list,$v_scene_list){
        $res = [];
        $input= [
            'type'=>'input',
            'return_name'=>'input',
            'data'=>[]
        ];
        foreach ($field_list as $k=>$v){
            if ($v['name'] == 'id'){
                $input_data=[
                    'is_back'=>true,
                    'table_name'=>$table['table_prefix'].$table['table_name'],
                    'comment'=>$v['comment'],
                    'field_name'=>$v['name'],
                    'field_type'=>$v['type'],
                    'enum'=>json_decode($v['enum'],true)
                ];
                array_push($input['data'],$input_data);
                break;
            }
        }
        array_push($res,$input);

        $validate = [
            'type'=>'validate',
            'input_name'=>'input',
            'return_name'=>'validate',
            'validate'=>[]
        ];
        foreach ($v_scene_list as $k=>$v) {
            if ($v['name']=='only_id'){
                $validate['validate'] = $v;
                break;
            }
        }
        array_push($res,$validate);

        $select = [
            'type'=>'select',
            'select_type'=>'find',
            'table_name'=>$table['table_prefix'].$table['table_name'],
            'alias'=>'',
            'data'=>[],
            'join'=>[],
            'condition'=>[],
            'where'=>[
                [
                    "table_name"=>$table['table_prefix'].$table['table_name'],
                    "comment"=>"id",
                    "field_name"=>"id",
                    "field_type"=>"Int",
                    "condition"=>"=",
                    "con_var_name"=>"input",
                    "con_field_name"=>"id",
                    "enum"=>$input['data'][0]['enum']
                ]
            ],
            'return_name'=>'select_res',
        ];
        array_push($res,$select);
        return json_encode($res);
    }
    //update的数据生成
    public function create_update_data($table,$field_list,$v_scene_list){
        $res = [];
        $input= [
            'type'=>'input',
            'return_name'=>'input',
            'data'=>[]
        ];
        foreach ($field_list as $k=>$v){
            $input_data=[
                'is_back'=>true,
                'table_name'=>$table['table_prefix'].$table['table_name'],
                'comment'=>$v['comment'],
                'field_name'=>$v['name'],
                'field_type'=>$v['type'],
                'enum'=>json_decode($v['enum'],true)
            ];
            array_push($input['data'],$input_data);
        }
        array_push($res,$input);

        $validate = [
            'type'=>'validate',
            'input_name'=>'input',
            'validate'=>[],
            'return_name'=>'validate'
        ];
        foreach ($v_scene_list as $k=>$v) {
            if ($v['name']=='all_field'){
                $validate['validate'] = $v;
                break;
            }
        }
        array_push($res,$validate);

        $update = [
            'type'=>'update',
            'table_name'=>$table['table_prefix'].$table['table_name'],
            'data'=>[
                [
                    "table_name"=>"tp_user",
                    "comment"=>"用户名",
                    "field_name"=>"username",
                    "field_type"=>"VarChar",
                    "root_var_name"=>"input",
                    "root_field_name"=>"username",
                    "enum"=>[]
                ],
            ],
            'where'=>[
                [
                    "table_name"=>$table['table_prefix'].$table['table_name'],
                    "comment"=>"id",
                    "field_name"=>"id",
                    "field_type"=>"Int",
                    "condition"=>"=",
                    "con_var_name"=>"input",
                    "con_field_name"=>"id",
                    "enum"=>[]
                ]
            ],
            'return_name'=>'update_res',
        ];
        foreach ($field_list as $k=>$v){
            $update_data=[
                'table_name'=>$table['table_prefix'].$table['table_name'],
                'comment'=>$v['comment'],
                'field_name'=>$v['name'],
                'field_type'=>$v['type'],
                "root_var_name"=>"input",
                "root_field_name"=>$v['name'],
                'enum'=>json_decode($v['enum'],true)
            ];
            array_push($update['data'],$update_data);
        }

        array_push($res,$update);
        return json_encode($res);
    }
    //delete的数据生成
    public function create_delete_data($table,$field_list,$v_scene_list){
        $res = [];
        $input= [
            'type'=>'input',
            'return_name'=>'input',
            'data'=>[]
        ];
        foreach ($field_list as $k=>$v){
            if ($v['name']=='id'){
                $input_data=[
                    'is_back'=>true,
                    'table_name'=>$table['table_prefix'].$table['table_name'],
                    'comment'=>$v['comment'],
                    'field_name'=>$v['name'],
                    'field_type'=>$v['type'],
                    'enum'=>json_decode($v['enum'],true)
                ];
                array_push($input['data'],$input_data);
                break;
            }
        }
        array_push($res,$input);

        $validate = [
            'type'=>'validate',
            'input_name'=>'input',
            'return_name'=>'validate',
            'validate'=>[]
        ];
        foreach ($v_scene_list as $k=>$v) {
            if ($v['name']=='only_id'){
                $validate['validate'] = $v;
                break;
            }
        }
        array_push($res,$validate);

        $delete = [
            'type'=>'delete',
            'table_name'=>$table['table_prefix'].$table['table_name'],
            'where'=>[
                [
                    "table_name"=>$table['table_prefix'].$table['table_name'],
                    "comment"=>"id",
                    "field_name"=>"id",
                    "field_type"=>"Int",
                    "condition"=>"=",
                    "con_var_name"=>"input",
                    "con_field_name"=>"id",
                    "enum"=>[]
                ]
            ],
            'return_name'=>'update_res',
        ];

        array_push($res,$delete);
        return json_encode($res);
    }






}
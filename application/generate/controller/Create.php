<?php

namespace app\generate\controller;

use think\Controller;
use think\facade\Build;
use think\facade\Config;
use think\facade\Env;

/**
 * @title PHP代码生成（01-01）
 * @description 生成控制器、模型、校验
 * @group 接口分组（01）
 * @header name:key require:1 default: desc:秘钥(区别设置)
 * @param name:public type:int require:1 default:1 other: desc:公共参数(区别设置)
 */
class Create extends Controller
{

    /**
     * @title 创建控制器
     * @description 创建控制器、模型、校验
     * @author 开发者（宋晓文）
     * @url /generate/Create/build
     **/
    public function build(){
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
        $create_data = $generate_model->get_create_data($input['table_id']);
        $create_data['app_namespace']='app';
        if(empty($create_data)){
            $msg['msg']="无数据，创建失败！";
            return $this->errorJson($msg);
        }

        //生成默认文件
        $data = [
            'module_name'  => $create_data['db_name'],
            'table_title'  => $create_data['table_title'],
            'table_comment'  => $create_data['table_title'],
            'group_name'  => $create_data['group_name'],
            'table_name'  => $create_data['table_name'],
            'author'  => $create_data['person_name'],
        ];
        $module_files= array(
            '__file__'   => ['common.php'],
            '__dir__'    => ['behavior', 'controller','validate', 'model','config'],
            'controller' => ['Index'],
            'model'      => [],
            'config'     => [],
            'validate'  => []
        );
        $re=\think\facade\Build::module($data['module_name'],$module_files);

        //验证器数据
        $function_list = $create_data['function_list'];
        $validate_data = array();
        $validate_data['model_name']=$create_data['db_name'];
        $c_validate_data = array();
        foreach ($function_list as $k=>$v){

            foreach ($v['function_data'] as $key=>$value){
                if ($value['type']=='validate'){
                    foreach ($c_validate_data as $c_k=>$c_v){
                        if ($value['validate']['name']==$c_v['name']){
                            break 2;
                        }
                    }
                    $temp=array();
                    $temp['name'] = $value['validate']['name'];
                    $temp['validate'] = $value['validate']['validate'];
                    array_push($c_validate_data,$temp);
                }
            }
        }
        //整理验证器数据格式
        $c_val_data = array();
        $c_val_data['app_namespace']='app';
        $c_val_data['module_name']=$create_data['db_name'];
        $c_val_data['table_name']=$create_data['table_name'];
        $c_val_data['rule']=array();
        $c_val_data['message']=array();
        $c_val_data['scene']=array();
        foreach ($c_validate_data as $k=>$v){
            $temp_scene=array();
            $temp_scene['name'] = $v['name'];
            $temp_scene['value'] = '';
            foreach($v['validate'] as $v_k=>$v_v){
                if ($temp_scene['value']!==''){
                    $temp_scene['value'].=",";
                }
                $temp_scene['value'].="'".$v_v['field_name']."'";

            }
            array_push( $c_val_data['scene'],$temp_scene);

            foreach ($v['validate'] as $v_k=>$v_v){
                for($i=0;$i<count($c_val_data['rule']);$i++){
                    if ($c_val_data['rule'][$i]['name']==$v_v['field_name']){
                        continue 2;
                        break;
                    }
                }
                $temp_rule=array();
                $temp_rule['name'] = $v_v['field_name'];
                $temp_rule['value'] = "";

                foreach ($v_v['validate_date'] as $v_d_k=>$v_d_v){
                    if ($temp_rule['value']!==""){
                        $temp_rule['value'].=",";
                    }
                    $temp_rule['value'].="'".$v_d_v['rule']."'";

                    if ($v_d_v['value']!==''){
                        $temp_rule['value'].= "=>'".$v_d_v['value']."'";
                    }
                    $temp_message=array();
                    $temp_message['name']=$v_v['field_name'].".".$v_d_v['rule'];
                    $temp_message['value']=$v_d_v['msg'];

                    array_push($c_val_data['message'],$temp_message);
                }
                array_push($c_val_data['rule'],$temp_rule);
            }
        }
//        dump($c_val_data);
//        return;

        //验证器写入数据
        $validate_file = Env::get('app_path').parse_name($data['module_name']).'/validate/'.parse_name($data['table_name'],true).'.php';
        $validate_content = "<?php".$this->create_validate($c_val_data);
        file_put_contents($validate_file,$validate_content);

        //模型数据
        foreach ($create_data['function_list'] as $f_list_k=>$f_list_v){
            $input_data=[];
            $return_data=[];
            //  $f_list_v   一个个方法
            foreach ($f_list_v['function_data'] as $m_list_k=>$m_list_v){
                //  $m_list_v   方法里的模块
                if ($m_list_v['type']=='input'){
                    foreach ($m_list_v['data'] as $k=>$v){
                        $temp=[];
                        $temp['name'] = $v['field_name'];
                        $temp['type'] = $v['field_type'];
                        $temp['comment'] = $v['comment'];
                        array_push($input_data,$temp);
                        if ($v['is_back']){
                            array_push($return_data,$temp);
                        }
                    }
                }
                if($m_list_v['type']=='select'){
                    if (count($m_list_v['join'])==0){
                        foreach ($m_list_v['data'] as $k=>$v){
                            if ($v['is_back']){
                                foreach ($return_data as $r_d_k=>$r_d_v){
                                    if ($r_d_v['name']==$v['field_name']){
                                        continue 2;
                                    }
                                }
                                $temp=[];
                                $temp['name'] = $v['field_name'];
                                $temp['type'] = $v['field_type'];
                                $temp['comment'] = $v['comment'];
                                array_push($return_data,$temp);
                            }
                        }
                    }else{
                        foreach ($m_list_v['data'] as $k=>$v){
                            if ($v['is_back']){
                                foreach ($return_data as $r_d_k=>$r_d_v){
                                    if ($r_d_v['name']==$m_list_v['alias'].'_'.$v['field_name']){
                                        continue 2;
                                    }
                                }
                                $temp=[];
                                $temp['name'] = $m_list_v['alias'].'.'.$v['field_name'];
                                $temp['type'] = $v['field_type'];
                                $temp['comment'] = $v['comment']."（".$m_list_v['table_name'].'）';
                                array_push($return_data,$temp);
                            }
                        }
                        foreach ($m_list_v['join'] as $j_k=>$j_v){
                            foreach ($j_v['data'] as $k=>$v){
                                if ($v['is_back']){
                                    foreach ($return_data as $r_d_k=>$r_d_v){
                                        if ($r_d_v['name']==$j_v['alias'].'.'.$v['field_name']){
                                            continue 2;
                                        }
                                    }
                                    $temp=[];
                                    $temp['name'] = $j_v['alias'].'.'.$v['field_name'];
                                    $temp['type'] = $v['field_type'];
                                    $temp['comment'] = $v['comment']."（".$j_v['table_name']."）";
                                    array_push($return_data,$temp);
                                }
                            }
                        }
                    }




                }

            }

            $create_data['function_list'][$f_list_k]['input_data']=$input_data;
            $create_data['function_list'][$f_list_k]['return_data']=$return_data;

        }

        //控制器写入数据
        $controller_file = Env::get('app_path').parse_name($data['module_name']).'/controller/'.parse_name($data['table_name'],true).'.php';
        $controller_content = "<?php".$this->create_controller($create_data);
        file_put_contents($controller_file,$controller_content);


        //创建空的model
        $model_file = Env::get('app_path').parse_name($data['module_name']).'/model/'.parse_name($data['table_name'],true).'.php';
        $model_content = "<?php".$this->create_model($create_data);
        file_put_contents($model_file,$model_content);


        // ---  config  ---
        //获取数据库中所有数据表
        $table_list_data = $generate_model->get_table_list_by_table_id($input['table_id']);

        //创建config/doc
        $doc_file = Env::get('app_path').parse_name($data['module_name']).'/config/doc.php';
        $doc_content = "<?php".$this->create_doc($table_list_data);
        file_put_contents($doc_file,$doc_content);

        //创建config/database
        $database_file = Env::get('app_path').parse_name($data['module_name']).'/config/database.php';
        $database_content = "<?php".$this->create_database($database_file);
        file_put_contents($database_file,$database_content);


        $msg['msg']="生成成功";
        return $this->successJson($msg);

    }



    //生成validate代码
    public function create_validate($data){
        $this->assign($data);
        $path=Env::get('module_path').'view\template\validate\validate.html';
        return $this->fetch($path);
    }
    //生成model代码
    public function create_model($data){
        $this->assign($data);
        $path=Env::get('module_path').'view\template\model\empty_model.html';
        return $this->fetch($path);
    }
    //生成controller代码
    public function create_controller($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\controller\controller.html';
        return $this->fetch($path);
    }
    //生成config/doc代码
    public function create_doc($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\config\doc.html';
        return $this->fetch($path);
    }
    //生成config/database代码
    public function create_database($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\config\database.html';
        return $this->fetch($path);
    }





    //成功、错误返回
    function successJson($data){
        $default = array(
            "status" => true,
            "msg" => "成功",
        );
        $data = array_merge($default, $data);
        return json($data);
    }
    function errorJson($data){
        $default = array(
            "status" => false,
            "msg" => "失败",
        );
        $data = array_merge($default, $data);
        return json($data);
    }

}

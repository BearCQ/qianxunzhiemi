<?php
/**
 * Created by PhpStorm.
 * User: zanboon-201
 * Date: 2019/3/19
 * Time: 11:37
 */

namespace app\generate\controller;
use think\Controller;

class Index extends Controller
{
    /**
     * @title 首页
     * @description 首页
     * @author 开发者（宋晓文）
     * @url /generate/Index/index
     **/
    public function index(){
        $index_model=new \app\generate\model\Index();
        $create_generate_database = $index_model->create_generate_database();

//        dump('1231231');
        //模板输出
        return $this->fetch('/view/index');
    }


    /**
     * @title 添加分组
     * @description 添加分组
     * @author 开发者（宋晓文）
     * @url /generate/Index/add_group
     **/
    public function table(){
        //模板输出
        return $this->fetch('/view/table');
    }

    /**
     * @title 添加控制器
     * @description 添加控制器
     * @author 开发者（宋晓文）
     * @url /generate/Index/add_controller
     **/
    public function add_controller(){
        //模板输出
        return $this->fetch('/view/add_controller');
    }

    /**
     * @title 验证器
     * @description 验证器
     * @author 开发者（宋晓文）
     * @url /generate/Index/validate_list
     **/
    public function validate_list(){
        //模板输出
        return $this->fetch('/view/validate_list');
    }
    /**
     * @title 控制器页面
     * @description 控制器页面
     * @author 开发者（宋晓文）
     * @url /generate/Index/controller_list
     **/
    public function controller_list(){
        //模板输出
        return $this->fetch('/view/controller_list');
    }
    /**
     * @title 编辑接口页面
     * @description 编辑接口页面
     * @author 开发者（宋晓文）
     * @url /generate/Index/edit_function
     **/
    public function edit_function(){
        //模板输出
        return $this->fetch('/view/edit_function');
    }
    /**
     * @title 一键添加function
     * @description 一键添加function
     * @author 开发者（宋晓文）
     * @url /generate/Index/auto_create_function
     **/
    public function auto_create_function(){
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

        $model = new \app\generate\model\Index();
        $create = $model->auto_create_function($input['table_id']);
        if (!$create){
            $msg['msg'] = '添加失败！';
            return $this->errorJson($msg);
        }else{
            $msg['msg'] = '添加成功！';
            return $this->successJson($msg);
        }
    }

    /**
     * @title 数据表修改
     * @description 数据表修改
     * @author 开发者（宋晓文）
     * @url /generate/Index/table_edit
     **/
    public function table_edit(){
        //模板输出
        return $this->fetch('/view/table_edit');
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
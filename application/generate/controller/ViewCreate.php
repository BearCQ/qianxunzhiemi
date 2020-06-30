<?php
namespace app\generate\controller;

use think\Controller;
use think\facade\Config;
use app\common\controller\Base;
use think\facade\Build;
use think\facade\Env;
use think\Request;

/**
 * @title 预览代码生成(01-03)
 * @description 预览代码生成
 * @group 代码生成(01)
 * @param name:token type:int require:1 default:1 other: desc:token
 */
class ViewCreate extends Base
{

    public function create_controller($data){
            $this->assign($data);
          // 改变当前操作的模板路径
          $path=Env::get('module_path').'view\template\controller\controller.html';
          return $this->fetch($path);
      }
    /**
     * @title 创建
     * @description 创建控制器、模型、校验
     * @author 开发者（梁敏）
     * @url /generate/view_create/build
     * @method POST
     * @param name:hostname type:string require:1 default:0 other:数据库地址 desc:
     * @param name:database type:string require:1 default:0 other:数据库 desc:
     * @param name:username type:string require:1 default:0 other:数据库帐号 desc:
     * @param name:password type:string require:1 default:0 other:数据库密码 desc:
     * @param name:module_name type:string require:1 default:0 other:模块 desc:格式为小写加下划线如shop_admin
     * @param name:table_title type:string require:1 default:0 other:表名称 desc:表名称，也做接口相关名称
     * @param name:module_no type:int require:1 default:0 other:模块id desc:
     * @param name:controller_no type:int require:1 default:0 other:控制器id desc:
     * @param name:group_name type:string require:1 default:0 other:接口分组 desc:
     * @param name:table_name type:string require:1 default:0 other:表 desc:不带前缀格式为小写加下划线如shop_admin
     * @param name:author type:string require:1 default:0 other:开发者 desc:
     * @return:
     */
    public function build(){
        $data=input();
        $httpController = $this->urls($data,'controller');
        $httpModel = $this->urls($data,'model');
        $httpValidate = $this->urls($data,'validate');
        $msg['data']['controller_url'] = $httpController;
        $msg['data']['model_url'] = $httpModel;
        $msg['data']['validate_url'] = $httpValidate;
        return $this->successJson($msg);
    }
    public function create_model($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\model\model.html';
        return $this->fetch($path);
    }

    public function create_validate($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\validate\validate.html';
        return $this->fetch($path);
    }
    
    //预览控制器代码
    public function preview()
    {
        $data = input();
        $data['app_namespace']='app';
//        $data['module_name']='shop_admin';
//        $data['table_title']='店铺管理员';
//        $data['module_no']='1';
//        $data['controller_no']='1';
//        $data['group_name']='店铺后台管理员';
//        $data['table_name']="shop_admin";
//        $data['author']='梁敏';
        $rule = [
            'token'  =>[ 'require'],
            'module_name'  =>[ 'require'],
            'table_title'  =>[ 'require'],
            'module_no'  =>[ 'require'],
            'controller_no'  =>[ 'require'],
            'group_name'  =>[ 'require'],
            'table_name'  =>[ 'require'],
            'author'  =>[ 'require'],
        ];

        $vmsg = [
            'token.require' => '不能为空',
            'module_name.require' => '不能为空',
            'table_title.require' => '不能为空',
            'module_no.require' => '不能为空',
            'controller_no.require' => '不能为空',
            'group_name.require' => '不能为空',
            'table_name.require' => '不能为空',
            'author.require' => '不能为空',
        ];
        if($data['hostname']){
            $conf_database=Config::get('app.database');
            $conf_database['hostname']=$data['hostname'];
            $conf_database['database']=$data['database'];
            $conf_database['username']=$data['username'];
            $conf_database['password']=$data['password'];
            Config::set('app.database',$data);
        }
        $validate = new \think\Validate($rule,$vmsg);
        $result   = $validate->batch()->check($data);
        if ($result !== true) {
            $msg['msg']='校验失败';
            $msg['validate']=$validate->getError();
            $msg['error_id']='1-05-01-0001';
            return $this->errorJson($msg);
        }
        $table_comment=get_table_comment(parse_name($data['table_name'],true));
        $data['table_comment']=$table_comment;
        if ($data['page_type'] == 'controller'){
            $conten="<?php".$this->create_controller($data);
            echo '<pre>';
            echo htmlspecialchars($conten);
        }elseif ($data['page_type'] == 'model'){
            $conten="<?php".$this->create_model($data);
            echo '<pre>';
            echo htmlspecialchars($conten);
        }else{
            $conten="<?php".$this->create_validate($data);
            echo '<pre>';
            echo htmlspecialchars($conten);
        }
    }

    public function urls($data,$mk)
    {
        $data['page_type'] = $mk;
        return url('generate/view_create/preview',$data,'',true);
    }
    

}
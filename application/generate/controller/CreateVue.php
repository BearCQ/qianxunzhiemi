<?php
namespace app\generate\controller;

use think\Db;
use think\facade\Config;
use app\common\controller\Base;
use think\facade\Build;
use think\facade\Env;
/**
 * @title vue代码生成(01-02)
 * @description vue代码生成
 * @group 代码生成(01)
 * @param name:token type:int require:1 default:1 other: desc:token
 */
class CreateVue extends Base
{
    public function create_api($data){
            $this->assign($data);
          // 改变当前操作的模板路径
          $path=Env::get('module_path').'view\template\vue\api\api.js';
          return $this->fetch($path);
      }
    /**
     * @title 创建
     * @description 创建api、首页、添加、编辑
     * @author 开发者（梁敏）
     * @url /generate/create_vue/build
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
     *
     * @return:
     */
    public function build(){
        $this->basePath=Env::get('root_path');
        $data=input();
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
            $conf_database=Config::get('database.');
            $conf_database['hostname']=$data['hostname'];
            $conf_database['database']=$data['database'];
            $conf_database['username']=$data['username'];
            $conf_database['password']=$data['password'];
            Config::set('database',$conf_database);
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
//        $dir= array("vue",'vue/src/api','vue/src/views');
//        $this->buildDir($dir);
        $api_file=$this->basePath.'vue/src/api/'.parse_name($data['module_name']).'/'.lcfirst(parse_name($data['table_name'])).'.js';
        $conten=$this->create_api($data);
        $this->buildFile(array($api_file));
        file_put_contents($api_file,$conten);


        $index_file=$this->basePath.'vue/src/views/'.parse_name($data['module_name']).'/'.parse_name($data['table_name']).'/index.vue';
        $conten=$this->create_index($data);
        $this->buildFile(array($index_file));
        file_put_contents($index_file,$conten);

        $add_page_file=$this->basePath.'vue/src/views/'.parse_name($data['module_name']).'/'.parse_name($data['table_name']).'/addPage.vue';
        $conten=$this->create_add_page($data);
        $this->buildFile(array($add_page_file));
        file_put_contents($add_page_file,$conten);

        $edit_page_file=$this->basePath.'vue/src/views/'.parse_name($data['module_name']).'/'.parse_name($data['table_name']).'/editPage.vue';
        $conten=$this->create_edit_page($data);
        $this->buildFile(array($edit_page_file));
        file_put_contents($edit_page_file,$conten);

        $msg['msg']='生成成功';
        return $this->successJson($msg);
    }
    public function create_index($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\vue\views\index.vue';
        return $this->fetch($path);
    }

    public function create_add_page($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\vue\views\addPage.vue';
        return $this->fetch($path);
    }
    public function create_edit_page($data){
        $this->assign($data);
        // 改变当前操作的模板路径
        $path=Env::get('module_path').'view\template\vue\views\editPage.vue';
        return $this->fetch($path);
    }
    /**
     * 创建目录
     * @access protected
     * @param  array $list 目录列表
     * @return void
     */
    protected function buildDir($list)
    {
        foreach ($list as $dir) {
            $this->checkDirBuild($this->basePath . $dir);
        }
    }
    /**
     * 创建目录
     * @access protected
     * @param  string $dirname 目录名称
     * @return void
     */
    protected function checkDirBuild($dirname)
    {
        if (!is_dir($dirname)) {
            mkdir($dirname, 0755, true);
        }
    }
    /**
     * 创建文件
     * @access protected
     * @param  array $list 文件列表
     * @return void
     */
    protected function buildFile($list)
    {
        foreach ($list as $file) {
            if (!is_dir(dirname($file))) {
                // 创建目录
                mkdir( dirname($file), 0755, true);
            }

            if (!is_file( $file)) {
                file_put_contents( $file, 'php' == pathinfo($file, PATHINFO_EXTENSION) ? "<?php\n" : '');
            }
        }
    }

}
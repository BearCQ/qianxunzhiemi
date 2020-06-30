<?php
//自动生成,请根据需要修改
namespace app\login\controller;
use app\common\controller\Base;
use function MongoDB\BSON\toJSON;
use think\Validate;
use tools\curl\Curl;

/**
 * @title 登录页面（模块04-02）
 * @description 登录说明
 * @group 登录（04）
 * @header name:model_id require:0 default:02-02 desc:模块
 * @groupremark 已使用错误码：1-04-02-0001 校验失败 1-04-02-0002 添加失败 1-04-02-0003 编辑校验失败 1-04-02-0004 编辑失败 1-04-02-0005 获取详情失败  1-04-02-0006 获取列表失败 1-04-02-0007获取单个详情失败 1-04-02-0008 删除失败
 */
class Login extends Base
{
    /**
     * @title 后台登录
     * @description 后台登录
     * @author 颜东淦
     * @url /login/login/index
     * @method POST
     * @param name:username type:int require:1 default:1 other: desc:账号
     * @param name:password type:int require:1 default:1 other: desc:密码
     * @return data:帐号信息@!
     * @data token:token
     *
     */
    public function index()
    {
        $data = input();

        $validate = new Validate([
            'username' => 'require',
            'password' => 'require',
        ], [
            'username' => '账号不能为空',
            'password' => '密码不能为空',
        ]);

        if (!$validate->check($data)) {
            $msg['msg'] = $validate->getError();
            return $this->errorJson($msg);
        }

        $account_model_api = Config('model_api.user');
        $url = $account_model_api . "/admin_user/info";

        $account = Curl::get($url, array('username' => $data['username']));
        $account_status = Curl::json2arr($account)['status'];

        //判断账号是否存在
        if (!$account_status) {
            $msg['msg'] = 'Account does not exist!';
            return $this->errorJson($msg);
        }

        $account = Curl::json2arr($account)['data'];

        if ($account['status'] == 0) {
            $msg['msg'] = '账号已被禁用';
            return $this->errorJson($msg);
        }

        //账号存在,验证密码
        if ($account['password'] === md5($data['password'])) {
            //生成并保存token
            $token_str = save_token($account['id'], 'admin_user');

            $msg['msg'] = '登录成功';
            $msg['token'] = $token_str;
            return $this->successJson($msg);
        } else {
            $msg['msg'] = '密码错误';
            return $this->errorJson($msg);
        }
    }

    /**
     * @title 生成新密码
     * @description 生成新密码
     * @author 宋晓文
     * @url /login/login/new_pwd
     * @method POST

     * @param name:password type:int require:1 default:1 other: desc:密码
     * @return data:帐号信息@!
     * @data token:token
     *
     */
    public function new_pwd()
    {
        $data = input();


        $validate = new Validate([
            'password' => 'require',
        ], [
            'password' => '密码不能为空',
        ]);

        if (!$validate->check($data)) {
            $msg['msg'] = $validate->getError();
            return $this->errorJson($msg);
        }


        $res['salt'] = substr(str_shuffle('abcedfghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
        $res['password'] = md5(md5($data['password']).$res['salt']);

        $msg['msg'] = '登录成功';
        $msg['data'] = $res;

        return $this->successJson($msg);

    }
}

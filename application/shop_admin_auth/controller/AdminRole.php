<?php
/**
 * Author: 陈庆锋
 * Date: 2018/9/5
 * Time: 14:45
 * Desc: 管理员权限
 */

namespace app\shop_admin_auth\controller;

use app\common\controller\Base;
use think\Db;
use tools\curl\Curl;

/**
 * @title 管理员角色（模块02-02）
 * @description 接口说明
 * @group 店铺管理员（02）
 * @header name:model_id require:0 default:13-02 desc:模块
 * @groupremark 已使用错误码：1-02-02-0001 校验失败 1-02-02-0002
 */
class AdminRole extends Base
{


    /**
     * @title 获取后台管理员角色
     * @description  获取后台管理员角色
     * @author 开发者（梁敏）
     * @url /shop_admin_auth/admin_role/role_by_token
     * @method POST
     * @param name:token require:1 other: desc:token
     *
     * @return:
     *
     */
    public function role_by_token()
    {
        $data = input();
        $rule = [
            'token' => 'require'

        ];

        $vmsg = [
            'token' => 'token必须'
        ];

        $validate = new \think\Validate($rule, $vmsg);
        $result = $validate
            ->batch()
            ->check($data);
        if ($result !== true) {
            $msg['msg'] = '校验失败';
            $msg['validate'] = $validate->getError();
            $msg['error_id'] = '1-02-02-0001';
            return $this->errorJson($msg);
        }
//        //调用登录模块，获取账号id。
//        $login_model_api = Config('model_api.login');
//        $url = $login_model_api."/account/info_by_token";
//        $account = Curl::get($url, array('token'=>$data['token']));
//        $account = Curl::json2arr($account);
//        if(!$account['status']){
//            return $this->errorJson($account);
//        }
//        $account=$account['data'];

        $map['sar.account_id'] = USERID;
        $shop_admin_role = Db::name('shop_admin_role')->alias('sar')
            ->join('tp_shop_role sr', 'sr.id=sar.shop_role_id')
            ->where($map)
            ->field("sr.*,sar.*")
            ->select();
        if ($shop_admin_role) {
            $msg['msg'] = '获取成功';
            $msg['list'] = $shop_admin_role;
            return $this->successJson($msg);
        } else {
            $msg['msg'] = '获取为空或获取失败';
            return $this->errorJson($msg);
        }
    }
}
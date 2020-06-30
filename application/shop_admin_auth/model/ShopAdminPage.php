<?php
/**
 * Created by PhpStorm.
 * author: 陈庆锋
 * Date: 2018/9/5
 * Time: 19:26
 * Desc：管理员权限模型
 */
namespace app\shop_admin_auth\model;
use think\Model;
use think\Db;

class ShopAdminPage extends Model
{
    public function edit($data){
        return $this->allowField(true)->save($data,['id'=>$data['id']]);
    }
}
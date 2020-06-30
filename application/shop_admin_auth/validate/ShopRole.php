<?php
namespace app\shop_admin_auth\validate;
use think\Validate;
class ShopRole extends Validate {

    protected $rule =   [
        'id'  =>['require','number']
    ];

    protected $message  =   [
        'id.require' => '名称必须',
        'id.number' => '名称必须数字',
    ];

    protected $scene = [
        'edit'  =>  ['id'],
        'info'  =>  ['id'],
    ];
}

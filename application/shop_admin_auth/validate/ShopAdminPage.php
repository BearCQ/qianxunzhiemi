<?php

namespace app\shop_admin_auth\Validate;
use think\Validate;
class ShopAdminPage extends Validate {

    protected $rule =   [
        'id'  =>['require','number'],
        'path'   => 'require',
        'component' => 'require',
    ];

    protected $message  =   [
        'id.require' => '名称必须',
        'id.number' => '名称必须数字',
        'path.require'     => 'vue路由path不能为空',
        'component.require'   => '组件不能为空',
        'sys_sign'=> '系统标识不能为空',
    ];

    protected $scene = [
        'add'  =>  ['path','component','sys_sign'],
        'edit'  =>  ['id'],
    ];
}

?>

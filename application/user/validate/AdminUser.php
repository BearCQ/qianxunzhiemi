<?php
namespace app\user\validate;
use think\Validate;
class AdminUser extends Validate {

    protected $rule =   [
        'id'  =>['require','number']
    ];

    protected $message  =   [
        'id.require' => 'id必须',
        'id.number' => 'id必须数字',
    ];

    protected $scene = [
        'edit'  =>  ['id'],
    ];
}

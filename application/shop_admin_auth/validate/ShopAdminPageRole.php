<?php
namespace app\shop_admin_auth\validate;
use think\Validate;
class ShopAdminPageRole extends Validate {

    protected $rule =   [
        'shop_page_id'  =>['require','number'],
        'shop_role_id'  =>['require','number']
    ];

    protected $message  =   [
        'shop_page_id.require' => 'shop_page_id不能为空！',
        'shop_page_id.number' => 'shop_page_id必须数字',
        'shop_role_id.require' => 'shop_role_id不能为空！',
        'shop_role_id.number' => 'shop_role_id必须数字',
    ];

    protected $scene = [
        'del'  =>  ['shop_page_id','shop_role_id'],
    ];

    public function sceneAdd()
    {
        return $this->only(['shop_page_id','shop_role_id'])
                    ->remove('shop_role_id','number');
    }

    public function sceneEdit()
    {
        return $this->only(['shop_page_id','shop_role_id'])
                    ->remove('shop_role_id','number');
    }
}

<?php
//自动生成,请根据需要修改
namespace app\user\model;

use think\Model;

class User extends Model {
	//新增
public function add($data){
    return $this->data($data)->allowField(true)->save();
}
	//修改
public function edit($data){
    return $this->allowField(true)->save($data,['id'=>$data['id']]);
}

}	
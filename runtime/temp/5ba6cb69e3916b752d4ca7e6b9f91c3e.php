<?php /*a:1:{s:92:"F:\aProjectDevelopment\qianxun\application\generate\view\template\controller\controller.html";i:1554892859;}*/ ?>

//自动生成,请根据需要修改
namespace <?php echo htmlentities($app_namespace); ?>\<?php echo htmlentities($module_name); ?>\controller;
use app\common\controller\Base;
use think\facade\Request;
use think\Db;
/**
* @title <?php echo htmlentities($table_title); ?>接口
* @description <?php echo htmlentities($table_title); ?>说明
* @group <?php echo htmlentities($group_name); ?>

*/
class <?php echo parse_name($table_name,true); ?> extends Base{

<?php foreach($function_list as $f_list_k=>$f_list_v): ?>
	/**
	* @title <?php echo htmlentities($f_list_v['function_title']); ?>

	* @description <?php echo htmlentities($f_list_v['function_desc']); ?>

	* @author 开发者（<?php echo htmlentities($f_list_v['person_name']); ?>）
	* @url /<?php echo parse_name($db_name); ?>/<?php echo parse_name($table_name); ?>/<?php echo parse_name($f_list_v['function_name']); ?>

	* @method <?php echo $f_list_v['method_type']=='*' ? '*' : htmlentities($f_list_v['method_type']); ?>

	* @param name:token require:1 default: desc:token
<?php foreach($f_list_v['input_data'] as $i_k=>$i_v): ?>
	* @param name:<?php echo htmlentities($i_v['name']); ?> type:<?php echo htmlentities($i_v['type']); ?> require:1 default:0 other:<?php echo htmlentities($i_v['comment']); ?> desc:
<?php endforeach; ?>
	*
<?php foreach($f_list_v['return_data'] as $r_k=>$r_v): ?>
	* @return <?php echo htmlentities($r_v['name']); ?>:<?php echo htmlentities($r_v['comment']); ?>

<?php endforeach; ?>
	*
	*/
	public function <?php echo parse_name($f_list_v['function_name']); ?> (){
<?php foreach($f_list_v['function_data'] as $f_data_k=>$f_data_v): if($f_data_v['type']=='input'): ?>
		//模块 - 输入数据
<?php foreach($f_data_v['data'] as $k=>$v): ?>
		$<?php echo htmlentities($f_data_v['return_name']); ?>['<?php echo htmlentities($v['field_name']); ?>'] = Request::<?php if($f_list_v['method_type'] =='*'): ?>param<?php endif; if($f_list_v['method_type'] =='post'): ?>post<?php endif; if($f_list_v['method_type'] =='get'): ?>get<?php endif; if($f_list_v['method_type'] =='put'): ?>put<?php endif; if($f_list_v['method_type'] =='delete'): ?>delete<?php endif; ?>('<?php echo htmlentities($v['field_name']); if($v['field_type']=="Int"): ?>/s<?php endif; ?>');
<?php endforeach; ?>

		// input结果返回
<?php foreach($f_data_v['data'] as $k=>$v): if($v['is_back']==true): ?>
		$msg['data']['<?php echo htmlentities($v['field_name']); ?>'] = $<?php echo htmlentities($f_data_v['return_name']); ?>['<?php echo htmlentities($v['field_name']); ?>'];
<?php endif; ?>
<?php endforeach; ?>
<?php endif; if($f_data_v['type']=='validate'): ?>
		//模块 - 验证器
		$<?php echo parse_name($table_name); ?>Validate = new \app\<?php echo htmlentities($db_name); ?>\validate\<?php echo parse_name($table_name,true); ?>;
		$<?php echo htmlentities($f_data_v['return_name']); ?> = $<?php echo parse_name($table_name); ?>Validate->scene('<?php echo htmlentities($f_data_v['validate']['name']); ?>')->check($<?php echo htmlentities($f_data_v['input_name']); ?>);
		if (!$<?php echo htmlentities($f_data_v['return_name']); ?>) {
			$msg['msg'] = '验证失败';
			$msg['validate'] = $<?php echo parse_name($table_name); ?>Validate->getError();
			return $this->errorJson($msg);
		}
<?php endif; if($f_data_v['type']=='select'): ?>
		// ---	模块 - 查询  ---
<?php if(empty($f_data_v['join'])): if(count($f_data_v['data'])!==0): ?>
		//查询字段
		$<?php echo parse_name($f_data_v['select_type']); ?>_fields = [<?php foreach($f_data_v['data'] as $w_k=>$w_v): if($w_k!==0): ?>,<?php endif; ?>'<?php echo parse_name($w_v['field_name']); ?>'<?php endforeach; ?>];
<?php endif; if(count($f_data_v['where'])!==0): ?>
		//查询条件
		$<?php echo parse_name($f_data_v['select_type']); ?>_map = [
<?php foreach($f_data_v['where'] as $w_k=>$w_v): ?>
			'<?php echo parse_name($w_v['field_name']); ?>' => <?php if(empty($w_v['con_var_name'])): ?><?php echo htmlentities($w_v['con_field_name']); else: ?>$<?php echo htmlentities($w_v['con_var_name']); ?>['<?php echo htmlentities($w_v['con_field_name']); ?>']<?php endif; ?>,
<?php endforeach; ?>
		];
<?php endif; ?>
		//获取数据
		$<?php echo htmlentities($f_data_v['return_name']); ?> = Db::name('<?php echo str_replace($table_prefix,'',$f_data_v['table_name']); ?>')<?php if(count($f_data_v['where'])!==0): ?>->where($<?php echo parse_name($f_data_v['select_type']); ?>_map)<?php endif; if(count($f_data_v['data'])!==0): ?>->field($<?php echo parse_name($f_data_v['select_type']); ?>_fields)<?php endif; ?>-><?php echo parse_name($f_data_v['select_type']); ?>();

		// <?php echo parse_name($f_data_v['select_type']); ?> 返回数据
<?php if($f_data_v['select_type']=='find'): if(count($f_data_v['data'])!==0): foreach($f_data_v['data'] as $w_k=>$w_v): ?>
		$msg['data']['<?php echo parse_name($w_v['field_name']); ?>'] = $<?php echo htmlentities($f_data_v['return_name']); ?>['<?php echo parse_name($w_v['field_name']); ?>'];
<?php endforeach; ?>
<?php endif; if(count($f_data_v['data'])===0): ?>
		$msg['data'] = $<?php echo htmlentities($f_data_v['return_name']); ?>;
<?php endif; else: ?>
		$msg['list'] = $<?php echo htmlentities($f_data_v['return_name']); ?>;
<?php endif; else: ?>

		//查询字段(join)
		$<?php echo parse_name($f_data_v['select_type']); ?>_fields = [<?php foreach($f_data_v['data'] as $w_k=>$w_v): if($w_k!==0): ?>,<?php endif; ?>'<?php echo htmlentities($f_data_v['alias']); ?>.<?php echo parse_name($w_v['field_name']); ?> as <?php echo htmlentities($f_data_v['alias']); ?>_<?php echo parse_name($w_v['field_name']); ?>'<?php endforeach; foreach($f_data_v['join'] as $j_k=>$j_v): foreach($j_v['data'] as $w_k=>$w_v): ?>,'<?php echo htmlentities($j_v['alias']); ?>.<?php echo parse_name($w_v['field_name']); ?>'<?php endforeach; ?><?php endforeach; ?>];
		//查询条件(join)
		$<?php echo parse_name($f_data_v['select_type']); ?>_map = [
<?php foreach($f_data_v['join'] as $j_k=>$j_v): foreach($f_data_v['where'] as $w_k=>$w_v): if($w_v['table_name']==$f_data_v['table_name']): ?>
			'<?php echo htmlentities($f_data_v['alias']); ?>.<?php echo parse_name($w_v['field_name']); ?>' => <?php if(empty($w_v['con_var_name'])): ?><?php echo htmlentities($w_v['con_field_name']); else: ?>$<?php echo htmlentities($w_v['con_var_name']); ?>['<?php echo htmlentities($w_v['con_field_name']); ?>']<?php endif; ?>,
<?php endif; if($w_v['table_name']==$j_v['table_name']): ?>
			'<?php echo htmlentities($j_v['alias']); ?>.<?php echo parse_name($w_v['field_name']); ?>' => <?php if(empty($w_v['con_var_name'])): ?><?php echo htmlentities($w_v['con_field_name']); else: ?>$<?php echo htmlentities($w_v['con_var_name']); ?>['<?php echo htmlentities($w_v['con_field_name']); ?>']<?php endif; ?>,
<?php endif; ?>
<?php endforeach; ?>
<?php endforeach; ?>
		];

		//获取数据(join)
		$<?php echo htmlentities($f_data_v['return_name']); ?> = Db::name('<?php echo str_replace($table_prefix,'',$f_data_v['table_name']); ?>')
			->alias('<?php echo htmlentities($f_data_v['alias']); ?>')
			->where($<?php echo parse_name($f_data_v['select_type']); ?>_map)
<?php foreach($f_data_v['join'] as $j_k=>$j_v): if($temp = false): ?><?php endif; ?>
			->join(['<?php echo htmlentities($j_v['table_name']); ?>'=>'<?php echo htmlentities($j_v['alias']); ?>'],'<?php foreach($f_data_v['condition'] as $con_k=>$con_v): if($con_v['alias']==$j_v['alias']): if($temp): ?> and <?php endif; if($temp = true): ?><?php endif; ?>
<?php echo htmlentities($con_v['alias']); ?>.<?php echo htmlentities($con_v['field']); ?> <?php echo htmlentities($con_v['condition']); if($con_v['left_var']===$f_data_v['return_name']): ?><?php echo htmlentities($f_data_v['alias'].".".$con_v['left_field']); else: ?><?php echo $con_v['left_var']=='' ? "'.".$con_v['left_field'].".'" : "'.$".$con_v['left_var']."['".$con_v['left_field']."'].'"; ?><?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>','<?php echo htmlentities($j_v['type']); ?>')
<?php endforeach; ?>
			->field($<?php echo parse_name($f_data_v['select_type']); ?>_fields)
			-><?php echo parse_name($f_data_v['select_type']); ?>();

		// <?php echo parse_name($f_data_v['select_type']); ?> 返回数据
<?php if($f_data_v['select_type']=='find'): foreach($f_data_v['data'] as $w_k=>$w_v): ?>
		$msg['data'] = $<?php echo htmlentities($f_data_v['return_name']); ?>['<?php echo parse_name($f_data_v['alias']); ?>.<?php echo parse_name($w_v['field_name']); ?>'];
<?php endforeach; foreach($f_data_v['join'] as $j_k=>$j_v): foreach($j_v['data'] as $w_k=>$w_v): ?>
		$msg['data'] = $<?php echo htmlentities($f_data_v['return_name']); ?>['<?php echo parse_name($j_v['alias']); ?>.<?php echo parse_name($w_v['field_name']); ?>'];
<?php endforeach; ?>
<?php endforeach; else: ?>
		$msg['list'] = $<?php echo htmlentities($f_data_v['return_name']); ?>;
<?php endif; ?>

<?php endif; ?>
<?php endif; if($f_data_v['type']=='insert'): ?>
		// ---	模块 - 新增  ---
		//插入的数据
		$insert_data = [
<?php foreach($f_data_v['data'] as $d_k=>$d_v): ?>
			'<?php echo htmlentities($d_v['field_name']); ?>'=><?php echo $d_v['root_var_name']=='' ? '' : "$".$d_v['root_var_name']."['".$d_v['root_field_name']."']"; ?>,
<?php endforeach; ?>
		];
		//添加数据
		$<?php echo htmlentities($f_data_v['return_name']); ?> = Db::name('<?php echo str_replace($table_prefix,'',$f_data_v['table_name']); ?>')->data($insert_data)->insert();
		if(!$<?php echo htmlentities($f_data_v['return_name']); ?>){
			$msg['msg'] = '插入数据失败！';
			return $this->errorJson($msg);
		}
		$msg['res'] = $<?php echo htmlentities($f_data_v['return_name']); ?>;
<?php endif; if($f_data_v['type']=='update'): ?>
		// ---	模块 - 修改  ---
		//更新的条件
		$update_date = [
<?php foreach($f_data_v['where'] as $d_k=>$d_v): ?>
		'<?php echo htmlentities($d_v['field_name']); ?>'=><?php echo $d_v['con_var_name']=='' ? '' : "$".$d_v['con_var_name']."['".$d_v['con_field_name']."']"; ?>,
<?php endforeach; ?>
		];
		//更新的数据
		$update_map = [
<?php foreach($f_data_v['data'] as $d_k=>$d_v): ?>
			'<?php echo htmlentities($d_v['field_name']); ?>'=><?php echo $d_v['root_var_name']=='' ? '' : "$".$d_v['root_var_name']."['".$d_v['root_field_name']."']"; ?>,
<?php endforeach; ?>
		];
		//获取数据
		$<?php echo htmlentities($f_data_v['return_name']); ?> = Db::name('<?php echo str_replace($table_prefix,'',$f_data_v['table_name']); ?>')->where($update_date)->update($update_map);
		if(!$<?php echo htmlentities($f_data_v['return_name']); ?>){
			$msg['msg'] = '更新据失败！';
			return $this->errorJson($msg);
		}
		$msg['res'] = $<?php echo htmlentities($f_data_v['return_name']); ?>;
<?php endif; if($f_data_v['type']=='delete'): ?>
		// ---  模块 - 删除  ---
		//删除的条件
		$delete_map = [
<?php foreach($f_data_v['where'] as $d_k=>$d_v): ?>
			'<?php echo htmlentities($d_v['field_name']); ?>'=><?php echo $d_v['con_var_name']=='' ? '' : "$".$d_v['con_var_name']."['".$d_v['con_field_name']."']"; ?>,
<?php endforeach; ?>
		];
		//删除数据
		$<?php echo htmlentities($f_data_v['return_name']); ?> = Db::name('<?php echo str_replace($table_prefix,'',$f_data_v['table_name']); ?>')->where($delete_map)->delete();
		if(!$<?php echo htmlentities($f_data_v['return_name']); ?>){
			$msg['msg'] = '删除数据失败！';
			return $this->errorJson($msg);
		}
		$msg['res'] = $<?php echo htmlentities($f_data_v['return_name']); ?>;
<?php endif; if($f_data_v['type']=='error_msg'): ?>
		//模块 - 错误提示
<?php foreach($f_data_v['hint'] as $h_k=>$h_v): if($h_k==0): ?>
		if<?php else: ?>else if<?php endif; ?>(<?php foreach($h_v['where'] as $k=>$v): if($k!==0): ?> && <?php endif; ?><?php echo $v['var_name']=='' ? htmlentities($v['field_name']) : "$".$v['var_name']."['".$v['field_name']."']"; ?> <?php echo htmlentities($v['condition']); ?> <?php echo $v['con_var_name']=='' ? htmlentities($v['con_field_name']) : "$".$v['con_var_name']."['".$v['con_field_name']."']"; ?>
<?php endforeach; ?>){
			$msg['msg'] = '<?php echo htmlentities($h_v['message']); ?>';
			return $this->errorJson($msg);
		}<?php endforeach; ?>

<?php endif; ?>

<?php endforeach; ?>

		//接口输出json数据
		$msg['msg'] = '操作成功！';
		return $this->successJson($msg);
	}
<?php endforeach; ?>

}

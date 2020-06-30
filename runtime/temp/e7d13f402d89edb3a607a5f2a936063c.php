<?php /*a:1:{s:81:"F:\aProjectDevelopment\qianxun\application\generate\view\template\config\doc.html";i:1554892859;}*/ ?>

return [
	'controller' => [
		//需要生成文档的类
<?php foreach($table_list as $k=>$v): ?>
		'app\<?php echo parse_name($db_name); ?>\controller\<?php echo parse_name($v['table_name'],true); ?>',
<?php endforeach; ?>
	],
];
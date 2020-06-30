<?php /*a:1:{s:88:"F:\aProjectDevelopment\qianxun\application\generate\view\template\validate\validate.html";i:1554892859;}*/ ?>

namespace <?php echo htmlentities($app_namespace); ?>\<?php echo htmlentities($module_name); ?>\validate;
use think\Validate;
class <?php echo parse_name($table_name,true); ?> extends Validate {
    //验证字段
    protected $rule = [
<?php foreach($rule as $k=>$v): ?>
        '<?php echo htmlentities($v['name']); ?>' => [<?php echo $v['value']; ?>],
<?php endforeach; ?>
    ];
    //返回消息
    protected $message = [
<?php foreach($message as $k=>$v): ?>
        '<?php echo htmlentities($v['name']); ?>' => '<?php echo htmlentities($v['value']); ?>',
<?php endforeach; ?>
    ];
<?php foreach($scene as $k=>$v): ?>

    // <?php echo htmlentities($v['name']); ?> 场景
    public function scene<?php echo ucfirst($v['name']); ?>(){
        return $this->only([<?php echo htmlentities($v['value']); ?>]);
    }
<?php endforeach; ?>
}

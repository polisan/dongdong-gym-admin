<?php
use yii\helpers\Html;

// 模拟数据
$fd['name'] = '1号场';
$fd['status'] = 10;
$st = [
    10 => '营业中',
    0 => '关闭',
]
?>

<?= Html::beginForm(['fieldsupdate'], 'post', ['class' => 'form-horizontal']) ?>
<div class="form-group" style="color:#000;">
    <label class="control-label">场地名称</label>
    <input type="text" value="<?= $fd['name'] ?>" />
</div>
<div class="form-group" style="color:#000;">
    <label class="control-label">当前状态</label>
    <?= Html::radioList('fieldUpdateForm["status"]', $fd['status'], $st, []) ?>
</div>
<?= Html::submitButton('修改', ['class' => 'btn']) ?>
<?= Html::endForm() ?>

<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\log\models\LogSearch */
/* @var $form yii\widgets\ActiveForm */

Modal::begin(['id' =>'modal-filter', 'closeButton' => ['id' => 'close-button']]);
?>

<div class="log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'log_time') ?>

    <?= $form->field($model, 'prefix') ?>

    <?php echo $form->field($model, 'message') ?>

    <div class="form-group">
        <?= Html::submitButton('Szukaj', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
Modal::end();
echo Html::a('Szukaj', ['#'], ['class' => 'btn btn-info float-left mr-1', 'id' => 'filterModal']);
$this->registerJs(<<<JS

$(function() {
    console.log('assds')
   $('#filterModal').click(function(e) {
     e.preventDefault();
     $('#modal-filter').modal('show');
   });
});
JS);
?>

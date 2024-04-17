<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\log\models\Log */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-form box box-primary">
    <div class="box-header">
        <?= Html::a('Lista', ['index'], ['class' => 'btn btn-primary btn-flat pull-left']) ?>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    
    <div class="box-body table-responsive">
        <div class="col-xs-6"></div>
        <div class="col-xs-6"></div>
        <div style="clear:both"></div>
        <?= $form->field($model, 'level')->textInput() ?>

        <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'log_time')->textInput() ?>

        <?= $form->field($model, 'prefix')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Zapisz', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('Anuluj',['index'], ['class' => 'btn btn-info btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

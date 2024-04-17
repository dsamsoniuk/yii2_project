<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\log\models\Log */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lista', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-view box box-primary">
    <div class="box-header">
        <?= Html::a('Lista', ['index'], ['class' => 'btn btn-primary btn-flat pull-left']) ?>
        <?= Html::a('Edytuj', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat pull-left']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat pull-left',
            'data' => [
                'confirm' => 'Czy na pewno chcesz usunąć ten element?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'level',
                'category',
                'log_time',
                'prefix:ntext',
                'message:ntext',
            ],
        ]) ?>
    </div>
</div>

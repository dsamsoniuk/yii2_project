<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\log\models\Log */

$this->title = 'Dodaj';
$this->params['breadcrumbs'][] = ['label' => 'Lista', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="log-create">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>

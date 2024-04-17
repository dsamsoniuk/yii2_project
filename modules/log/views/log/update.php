
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\log\models\Log */

$this->title = 'Edytuj: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lista', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edytuj';
?>
<div class="log-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
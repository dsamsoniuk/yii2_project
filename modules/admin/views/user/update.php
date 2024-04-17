<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Aktualizuj użytkownika: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Użytkownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card">
    <div class="card-body">
        <div class="user-update">
            <p>
                <?= Html::a('powrót', ['index'], ['class' => 'btn btn-default']) ?>
            </p>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
</div>
</div>

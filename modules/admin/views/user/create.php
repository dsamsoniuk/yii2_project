<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Dodaj użytkownika';
$this->params['breadcrumbs'][] = ['label' => 'Użytkownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">
    <div class="user-create">
            <p>
                <?= Html::a('powrót', ['index'], ['class' => 'btn btn-default']) ?>
            </p>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
    </div>
</div>

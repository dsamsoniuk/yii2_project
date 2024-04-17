<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Użytkownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card">
    <div class="card-body">
        <div class="user-view">

            <p>
                <?= Html::a('powrót', ['index'], ['class' => 'btn btn-default']) ?>

                <?= Html::a('Aktualizuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Na pewno chcesz usunąć?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'role',
                    'first_name',
                    'last_name',
                    'nip',
                    'email:email',
                    'image',
                    'status',
                    'logged_in_from',
                    'logged_in_at',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>

        </div>
</div>
</div>

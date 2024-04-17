<?php

use yii\bootstrap5\Button;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\log\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="log-index card">
    <div class="card-header">
    
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php echo Html::a('Wyczyść', ['index'], ['class' => 'btn btn-warning']); ?>

</div>
<div class="box-body table-responsive no-padding">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterPosition' => '',
            // 'as filterBehavior' => FilterStateBehavior::className(),
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                'id',
                'level',
                'category',
                'log_time:datetime',
                'prefix:ntext',
                 'message:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

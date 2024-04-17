<?php
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Zarejestruj się';
$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-briefcase form-control-feedback'></span>"
];
$fieldOptions4 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}"
];
$fieldOptions5 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>"
];
?>
<div class="card card-body">
<div class="login-box" >
    <!-- /.login-logo -->
    <div class="login-box-body">
                <p>UWAGA PRZEDSIĘBIORCO! Zanim  przystąpisz do  rejestracji wypełnij Formularz zamieszczony na stronie PARP: <br /> 
            <a href="https://serwis-uslugirozwojowe.parp.gov.pl/component/site/site/formularz-zgloszeniowy-kompetencje-dla-sektorow-2" target="_blank">
                https://serwis-uslugirozwojowe.parp.gov.pl/component/site/site/formularz-zgloszeniowy-kompetencje-dla-sektorow-2</a>
                </p>
        

<?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
        <div class="col-xs-6">
            <?= $form
            ->field($model, 'first_name', $fieldOptions)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('first_name')]) ?>
        <?= $form
            ->field($model, 'last_name', $fieldOptions)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('last_name')]) ?>
        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
       
           
        <?= $form
            ->field($model, 'password_new', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password_new')]) ?>
        <?= $form
            ->field($model, 'password_repeat', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password_repeat')]) ?>
        <?= $form
            ->field($model, 'agree')
            ->label('<p>Wyrażam zgodę na gromadzenie i przetwarzanie moich danych osobowych, podanych w formularzu zgłoszeniowym. Zapoznałam się z Obowiązkiem informacyjnym</p>')
            ->checkbox(['required' => true]) ?>

        </div>

        <div style="clear: both;"></div>
        
        <div class="row" style="clear:both">
            <!-- /.col -->
            <div class="col-xs-4 pull-right">
                <?= Html::submitButton('Zarejestruj się', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <div class="col-xs-12">
                <?= Html::a('powrót', ['site/login']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>


        <!-- /.social-auth-links -->

        <!--<a href="#">I forgot my password</a><br>-->

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>
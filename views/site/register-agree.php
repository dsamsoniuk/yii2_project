<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
yii\bootstrap5\Modal::begin(['id' =>'modal-register-agree', 'closeButton' => ['id' => 'close-button'], 'title'=>'<h4>Zgoda na przetwarzanie danych</h4>']);
?>
<p>Zgoda na przetwarzanie danych osobowych 
<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquet tellus ut libero interdum, sit amet egestas orci semper. Aliquam quis dictum diam, sit amet lacinia urna. Morbi vestibulum pulvinar cursus. Cras nulla lacus, molestie eu nisl ac, egestas dignissim quam. Suspendisse nunc elit, semper et ornare et, malesuada eget lectus. Donec ac lacus vitae nunc eleifend porttitor. Sed sit amet dictum augue.

Quisque metus lectus, porttitor sit amet iaculis a, dapibus vitae erat. Praesent efficitur rhoncus ligula non dignissim. Sed blandit sed nulla vitae porttitor. Ut facilisis finibus est, non ullamcorper lacus vulputate quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut ligula odio. Pellentesque nec odio vel ligula tempus condimentum in a neque. In porttitor sodales libero quis scelerisque. Sed neque erat, blandit quis erat eget, dapibus posuere odio.

Donec turpis tellus, fringilla eu eleifend eu, mattis at nulla. Sed eros tortor, tempus et quam vitae, tristique mollis nulla. Aliquam eget sodales elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam risus ipsum, bibendum non quam id, lobortis iaculis orci. Quisque at consectetur odio, sit amet suscipit est. Cras semper ornare lectus, ac lacinia lacus aliquam ut. Sed suscipit in purus a blandit. Morbi dignissim erat quis lectus volutpat volutpat. Nunc sed ante a neque imperdiet ultricies. Etiam sit amet tortor sit amet purus ullamcorper facilisis. Sed fringilla lacinia risus ac dictum. Suspendisse lacus tellus, imperdiet id massa nec, posuere sagittis massa. Nulla dui justo, blandit eget rutrum quis, bibendum eu massa. Phasellus ex massa, venenatis ac sollicitudin non, fermentum sed nibh. Suspendisse accumsan nunc et erat dictum, ac congue metus semper.

Cras quis ornare ipsum. Mauris tincidunt, libero ut iaculis euismod, orci eros semper nisi, eu volutpat arcu leo in ipsum. Nulla magna dui, dapibus vel iaculis ac, euismod at nibh. Aenean magna mauris, tristique molestie sapien et, elementum ornare metus. Mauris nec dignissim turpis, a iaculis nulla. Etiam turpis risus, porttitor tempus erat ut, rutrum pellentesque elit. Suspendisse nec ante consectetur, porttitor orci sed, mattis leo. Aenean non finibus neque, quis tincidunt massa. Donec quis sem a enim mollis maximus at id elit. Etiam finibus, magna auctor efficitur dictum, urna quam egestas tellus, ac viverra enim elit sed nisl. Vestibulum pulvinar euismod arcu, ut pretium elit molestie bibendum. </p>
<?php
yii\bootstrap5\Modal::end();
//echo Html::a('Pełna treść zgody', ['#'], ['class' => 'btn btn-info btn-flat pull-left', 'id' => 'filterModal']);
$this->registerJs("$(function() {
   $('#filterModal').click(function(e) {
     e.preventDefault();
     $('#modal-register-agree').modal('show');
   });
});");
?>
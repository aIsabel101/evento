<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?= $msg ?>
<h1> Subir Archivos Eventos</h1>
<?php $form =ActiveForm::begin([
    "method" => "post",
    "enableClientValidation"=> true,
    "options" => ["enctype" => "multipart/form-data"],
    ]);
?>
<?= $form->filed($model,"file[]")->fileInput(['multiple' =>true])?>
<?= Html::submitButton("Subir", ["class" => "btn btn-primary"])?>
<?php $form ->end() ?>
    
    
    
    >
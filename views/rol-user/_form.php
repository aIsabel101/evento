<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tipousuario;
use app\models\User;


/* @var $this yii\web\View */
/* @var $model app\models\RolUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-user-form">

    <?php $form = ActiveForm::begin(); ?>

    
     <?= $form->field($model, 'tipousuario_id')->dropDownList(
             ArrayHelper::map(TipoUsuario::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Tipo Usuario']
                 ) ?>

 <?= $form->field($model, 'user_id')->dropDownList(
             ArrayHelper::map(User::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Usuario']
                 ) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

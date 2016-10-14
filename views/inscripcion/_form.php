<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Evento;
use app\models\Paquete;
use app\models\User;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Inscripcion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripcion-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-xs-12">
        <div class="col-xs-4">
            
             <?= $form->field($model, 'evento_id')->dropDownList(
             ArrayHelper::map(Evento::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Evento']
                 ) ?>
        </div>
        
         <div class="col-xs-4">
            
          <?= $form->field($model, 'paquete_id')->dropDownList(
             ArrayHelper::map(Paquete::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Paquete']
                 ) ?>
    </div>
        <div class="col-xs-4">
            
             <?php 
    echo $form->field($model, 'user_id')->widget(Select2::classname(), [
   'data' => ArrayHelper::map(User::find()->where("tipousuario_id=".User::ROLE_PARTICIPANTEID)->leftJoin('rol_user', 'user.id=rol_user.user_id')->all(),'id', 'nombre'),
    'language' => 'es',
    'options' => ['placeholder'=> 'Seleccionar Participante'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>   
    
            
        </div>
     </div>


    <div class="col-xs-12">
        <div class="col-xs-4">
          <?= $form->field($model, 'codigoBar')->textInput(['maxlength' => true]) ?>   
        </div>
        <div class="col-xs-4">
            
            
            
        </div>
    </div>

    
    <div class="col-xs-12">
        
        <div class="col-xs-12">
            
             <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div> 
        </div>
    </div>

  

    <?php ActiveForm::end(); ?>

</div>

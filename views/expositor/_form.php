<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Evento;

/* @var $this yii\web\View */
/* @var $model app\models\Expositor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expositor-form">

    <?php $form = ActiveForm::begin([
        'options'=> [ 
            'enctype' => 'multipart/form-data' 
            
        ]
    ]); ?>
    <div class="col-xs-12">
        <div class="col-xs-4">
            
          <?php 
    echo $form->field($model, 'user_id')->widget(Select2::classname(), [
   'data' => ArrayHelper::map(User::find()->where("tipousuario_id=".User::ROLE_EXPOSITORID)->leftJoin('rol_user', 'user.id=rol_user.user_id')->all(),'id', 'nombre'),
    'language' => 'es',
    'options' => ['placeholder'=> 'Seleccionar Expositor'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>   
            
        </div>
        
        <div class="col-xs-4">
                       
       <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            
        </div>
        <div class="col-xs-4">
             <?php echo $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],['prompt'=>'Seleccione Estado']); ?>
       

            
        </div>
        
               
    </div>

    <div class="col-xs-12">
        <div class="col-xs-12">
            
             <label for="exampleInputEmail1">Evento</label>
            
             <?php echo Html::dropDownList('evento_expositor_id', 1, 
           ArrayHelper::map(\app\models\Evento::find()->all(), 'id', 'nombre')); ?>  

            
            
        </div>
    </div>

    <div class="col-xs-12">
        <div class="col-xs-12">
           <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div> 
            
        </div>
    </div>
            
   
    

    <?php ActiveForm::end(); ?>

</div>

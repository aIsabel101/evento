<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Evento;
use app\models\User;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recurso-form">
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-xs-12">
        <div class="col-xs-4">
            
           <?= $form->field($model, 'evento_id')->dropDownList(
             ArrayHelper::map(Evento::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Evento']
                 ) ?> 
        </div>

        
         <div class="col-xs-4">
        <?php echo $form->field($model, 'tipo')->dropDownList(['Acreditación' => 'Acreditación', 'Refrigerio' => 'Refrigerio', 'Varios' => 'Varios'],['prompt'=>'Seleccione Tipo Recurso']); ?>
       
    </div>
    
    <div class="col-xs-4">
        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
 
    </div>
        
               
        
    </div>
    
    <div class="col-xs-12">
         <div class="col-xs-4">
       <?= $form->field($model, 'cantidad')->textInput() ?>
       
    </div>

        <div class="col-xs-4">
       <?= $form->field($model, 'fecha')->widget(
            DatePicker::className(), [
             // inline too, not bad
               'inline' => false, 
               // modify template for custom rendering
              // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
              'clientOptions' => [
                  'autoclose' => true,
                 'format' => 'yyyy-m-d'
        ]
]);?>
        
    </div>
        
    <div class="col-xs-4">
     <?= $form->field($model, 'detalle')->textarea(['rows' => 1]) ?>   
    </div>
        
   
        
<!--    <div class="col-xs-4">
        
        
        //<?php 

//    echo $form->field($model, 'colaborador_id')->widget(Select2::classname(), [
//   'data' => ArrayHelper::map(Colaborador::find()->all(),'id', 'user.nombre'),
//    'language' => 'es',
//    'options' => ['placeholder'=> 'Seleccionar '],
//    'pluginOptions' => [
//        'allowClear' => true
//    ],
//]);
//    ?>
        
        
      
   
    </div>-->
            
<!--    <div class="col-xs-4">
                
//<?php 
//    echo $form->field($model, 'tema_id')->widget(Select2::classname(), [
//   'data' => ArrayHelper::map(Tema::find()->all(),'id', 'nombre'),
//    'language' => 'es',
//    'options' => ['placeholder'=> 'Seleccionar tema'],
//    'pluginOptions' => [
//        'allowClear' => true
//    ],
//]);
//    ?>
    </div>-->

        </div>
    
          <div class="col-xs-12">
    <div class="col-xs-12">
     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>   
         </div>   
    </div>

    

    <?php ActiveForm::end(); ?>
        
        
    </div>

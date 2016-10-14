<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\TipoEvento;
use app\models\User;
use kartik\time\TimePicker;
use app\models\TemaExpositor;
use app\models\Horario;
use dosamigos\datepicker\DatePicker;

//use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */
?> <h1> Cronograma</h1>

<?= Html::a('Volver', ['index', 'id' => $model->id], ['class' => '.btn-success']) ?>

<div class="evento-form">

    <?php $form = ActiveForm::begin([
        //'id'=>$model->formName(),
       // 'enableAjaxValidation'=>true,
       // 'validationUrl'=>Url::toRouter('evento/validation')
    ]);     
    ?>
    
    
          
        <div class="col-xs-12">
            <div class="col-xs-4">
                             <?php

            $sql="SELECT e.*
            FROM expositor e, evento_expositor ex
            WHERE e.id=ex.expositor_id  and ex.evento_id=".$model->id;

                   // \app\models\Certificado::esta_impresso;
                   // var_dump( \app\models\Expositor::findBySql($sql)->all());
                              ?>
            <?= $form->field($modeltemaexpositor, 'expositor_id')->dropDownList(
            ArrayHelper::map(\app\models\Expositor::findBySql($sql)->all(), 'id', 'nombre'),
            ['prompt'=>'Seleccione Expositor']
                               ) ?>

                 </div>
            
                <div class="col-xs-4">
                     <?= $form->field($modeltemaexpositor, 'tema_id')->dropDownList(
                      ArrayHelper::map(app\models\Tema::find()->all(), 'id', 'nombre'),
                      ['prompt'=>'Seleccione el tema']
                 ) ?>
                    
                </div>
                
               
                <div class="col-xs-4">
                    
                          <?= $form->field($modeltemaexpositor, 'fecha_inicio')->widget(
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
                   
                </div>   
                
                 
            
             <div class="col-xs-12">
            
            <div class="col-xs-3">
                   <?php 

        echo '<label class="control-label">Hora inicio</label>';
        echo TimePicker::widget(['name' => 'hora_inicio']);
            ?>  
            </div>
                  <div class="col-xs-3">
                           
                <?php
        echo '<label class="control-label">Hora fin</label>';
        echo TimePicker::widget(['name' => 'hora_fin']);
             ?>
                
            </div>
         
            <div class="col-xs-6">
                      
             <?= $form->field($modeltemaexpositor, 'estado')->textInput(['maxlength' => true]) ?>
                
                
            </div>
            
         </div> 
         
        <div class="col-xs-12">
            
             <div class="col-xs-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Aceptar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             <?= Html::a('Ver Cronograma', ['viewcronograma', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        
        
        
        </div>
           </div> 
                       </div> 

     <?php ActiveForm::end(); ?>
        </div>

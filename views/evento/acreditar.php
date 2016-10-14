<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Acreditacion;


/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="evento-acreditar">
  <h1><?= Html::encode($this->title) ?></h1>
  
 ?>

<?= Html::a('Volver', ['index', 'id' => $model->id], ['class' => '.btn-success']) ?>

<div class="evento-form">

    <?php $form = ActiveForm::begin([
        //'id'=>$model->formName(),
       // 'enableAjaxValidation'=>true,
       // 'validationUrl'=>Url::toRouter('evento/validation')
    ]);     
    ?>
             <div class="col-xs-12">
            
            
                  <div class="col-xs-3">
                      
                      
                       <div class="col-xs-4">
            <?php
            //Evento::find()->all()
            $sql = 'SELECT  a.*
            FROM acreditacion a
            WHERE  a.id not in (
            SELECT  DISTINCT(a.id)
            FROM acreditacion a , inscripcion  i
            WHERE a.id=i.acreditacion_id  and i.user_id ='.$model->id.'
            )';

            
            ?>
             <?= $form->field($modelacreditacion, 'estado')->dropDownList(
             ArrayHelper::map(Acreditacion::findBySql($sql)->all(), 'estado'),
             ['prompt'=>'Seleccionar Acreditar']
                 ) ?>
                           
                           
                           
             <?= $form->field($modelacreditacion, 'estado')->dropDownList(['Pendiente' => 'Pendiente', 'Entregado' => 'Entregado'],['prompt'=>'Seleccione Estado']); ?>

             
        </div>
                           
            
            </div>
         
            
                 
         </div> 
         
        <div class="col-xs-12">
            
             <div class="col-xs-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Aceptar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             <?= Html::a('Acreditar', ['inscritos', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        
        
        
        </div>
           </div> 
                       </div> 

     <?php ActiveForm::end(); ?>
        </div>

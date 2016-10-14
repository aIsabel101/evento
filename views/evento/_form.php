<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\TipoEvento;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-form">

    <?php $form = ActiveForm::begin([
        //'id'=>$model->formName(),
       // 'enableAjaxValidation'=>true,
       // 'validationUrl'=>Url::toRouter('evento/validation')
    ]);     
    ?>
    
    
    
    
    <div class="col-xs-4">
     <?= $form->field($model, 'tipo_evento_id')->dropDownList(
             ArrayHelper::map(TipoEvento::find()->all(), 'id', 'nombre'),
             ['prompt'=>'Seleccionar Tipo Evento']
                 ) ?>
   
          </div>  
    <div class="col-xs-8">
       <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
       </div>
    <div class="col-xs-12">
    <?= $form->field($model, 'tema_principal')->textInput(['maxlength' => true]) ?>
    </div>  

         <div class="col-xs-3">

         <?= $form->field($model, 'fecha_inicio')->widget(
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




     <div class="col-xs-3">
         <?= $form->field($model, 'fecha_fin')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
           // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]]);?>


         </div>
        <?= $form->field($model, 'costo')->hiddenInput()->label(false) ?>
          <div class="col-xs-3">
                <?php echo $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Inactivo' => 'Inactivo'],['prompt'=>'Seleccione Estado']); ?>
        </div>

       <div class="col-xs-3">

                 <?= $form->field($model, 'horas')->textInput(['maxlength' => true]) ?>

     </div>      
     <div class="col-xs-12">

        <?= $form->field($model, 'requisitos')->textInput(['maxlength' => true]) ?>
    </div>
        <?= $form->field($model, 'latitud')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'longitud')->hiddenInput()->label(false) ?>
    <div class="col-xs-4">
        <?= $form->field($model, 'nombre_direccion')->textInput(['maxlength' => true]) ?>
          <?php echo '<div id="map"></div>'; ?>
    </div>
    
    <div class="col-xs-3">
       <?= $form->field($model, 'cantidad')->textInput() ?>
     </div> 



        <div class="col-xs-5">


   <?= $form->field($model, 'file')->fileInput() ?>    
        </div>


        <div class="col-xs-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
           </div>  
         </div>

        <?php ActiveForm::end(); ?>

    </div>
    <script>
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
      });

      var drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {
          position: google.maps.ControlPosition.TOP_CENTER,
          drawingModes: [
            google.maps.drawing.OverlayType.MARKER,
            google.maps.drawing.OverlayType.CIRCLE,
            google.maps.drawing.OverlayType.POLYGON,
            google.maps.drawing.OverlayType.POLYLINE,
            google.maps.drawing.OverlayType.RECTANGLE
          ]
        },
        markerOptions: {icon: 'images/beachflag.png'},
        circleOptions: {
          fillColor: '#ffff00',
          fillOpacity: 1,
          strokeWeight: 5,
          clickable: false,
          editable: true,
          zIndex: 1
        }
      });
      drawingManager.setMap(map);
    }

        </script>

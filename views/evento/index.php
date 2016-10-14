<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Evento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?php
        if(\app\models\User::hasAcess("evento",'create'))
        {
        ?>
        
      <?= Html::a('Crear Evento', ['create'], ['class' => 'btn btn-success']) ?>
        <?php }  ?>
        
        
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=> function($model){
            if($model->estado =='Inactivo')
            {
                return ['class'=>'danger'];
            } else {
                 return ['class'=>'success'];
            }
        
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'tipo_evento_id',
                'value'=>'tipoEvento.nombre',
                ],
                'nombre',
                'tema_principal',
            [
                'attribute'=>'fecha_inicio',
                'value'=>'fecha_inicio',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                'model'=>$searchModel,
                'attribute'=>'fecha_inicio',
                'clientOptions'=>[
                 'autoclose'=>'true',
                'format'=>'yyyy-mm-dd',
                        ]
                ]),
            ],
            
            // 'fecha_fin',
            // 'costo',
            // 'estado',
            // 'requisitos',
            // 'latitud',
            // 'longitud',
            // 'nombre_direccion',
            // 'horas',
            // 'cantidad',

            [  
        'class' => 'yii\grid\ActionColumn',
   
        'template'=>'{cronograma}{inscritos}{update}{view}{delete}',
         'buttons'=>[
             
             'cronograma'=> function($url, $modeltemaexpositor){
             return Html::a(
                     '<span class="glyphicon glyphicon-save-file"></span>',
                     $url,
                     [
                         'tittle'=>'cronograma',
                         'data-pjax' => '0',
                        
                     ]
                     
                     );
             }, 
                      'inscritos' => function ($url, $model) {
            return Html::a(
                '<span class="glyphicon glyphicon-user"></span>',
                $url, 
                [
                    'title' => 'inscritos',
                   'data-pjax' => '0',
                ]
            );
        },
             
         ],
            ],
       ],
        
    ]); ?>
    
</div>

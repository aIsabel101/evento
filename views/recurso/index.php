<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registrar Recurso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Recurso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           
             [
                'attribute'=>'evento_id',
                'value'=>'evento.nombre',
                ],
           //'colaborador_id',
            
           // 'tema_id',
          //   'tipo',
            'nombre',
            'cantidad',
            
            [
            'attribute'=>'fecha',
            'value'=>'fecha',
            'format'=>'raw',
            'filter'=>DatePicker::widget([
                'model'=>$searchModel,
                 'attribute'=>'fecha',
                    'clientOptions'=>[
                     'autoclose'=>'true',
                      'format'=>'yyyy-mm-dd',
                        ]
                ]),
                    
                    
            ],
            // 'detalle:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

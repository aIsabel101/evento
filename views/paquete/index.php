<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaqueteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paquete';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paquete-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Paquete', ['create'], ['class' => 'btn btn-success']) ?>
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

            //'id',
            
               [
                'attribute'=>'evento_id',
                'value'=>'evento.nombre',
                ],
               [
                'attribute'=>'tipo_paquete_id',
                'value'=>'tipoPaquete.nombre',
                ],
            
            //'nombre',
            'monto',
            // 'fecha_fin',
            'descripcion:ntext',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

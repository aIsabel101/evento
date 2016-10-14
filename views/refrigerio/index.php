<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RefrigerioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Refrigerios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigerio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Refrigerio', ['create'], ['class' => 'btn btn-success']) ?>
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

            'id',
            'evento_id',
            'nombre',
            'estado',
            'detalle:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

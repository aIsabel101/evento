<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tema';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tema-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Tema', ['create'], ['class' => 'btn btn-success']) ?>
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

           // 'id',
            'nombre',
            'descripcion:ntext',
            'area',
            'estado',
            // 'id_usuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

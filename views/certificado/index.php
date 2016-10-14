<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CertificadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Certificado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Certificado', ['create'], ['class' => 'btn btn-success']) ?>
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
            'tema_id',
            'user_id',
            'fecha',
            // 'tipo',
            // 'codigo',
            // 'descripcion:ntext',
             'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

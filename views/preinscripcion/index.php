<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PreinscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preinscripcions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preinscripcion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Preinscripcion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'evento_id',
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            // 'monto',
            // 'fecha',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

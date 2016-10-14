<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SitioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sitio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Sitio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'expositor_id',
            'tema_id',
            'nombre',
            'descripcion:ntext',
            // 'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

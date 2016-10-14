<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\eventoExpositorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cronograma';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-expositor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cronograma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'evento_id',
            'expositor_id',
            'fecha_fin',
            'fecha_ini',
            // 'hora_inicio',
            // 'hora_fin',
            // 'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

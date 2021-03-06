<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsistenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asistencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asistencia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asistencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigoBar',
            'evento_id1',
            'fecha',
            'expositor_id',
            // 'user_id',
            // 'participante_id',
            // 'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

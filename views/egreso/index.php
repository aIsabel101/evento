<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgresoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egresos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egreso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Egreso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'acreditacion_id',
            'recurso_id',
            'evento_id',
            'nombre',
            // 'costo',
            // 'cantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

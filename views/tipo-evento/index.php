<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoEventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Evento';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Tipo Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nombre',
            'descripcion:ntext',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

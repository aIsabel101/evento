<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Acreditacion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscripcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripción';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripcion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Inscripción', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            [
                'attribute'=>'evento_id',
                'value'=>'evento.nombre',
                ],
            
            [
                'attribute'=>'paquete_id',
                'value'=>'paquete.nombre',
                ],

            
            [
                'attribute'=>'user_id',
                'value'=>'user.nombre',
                ],

               'monto',

            [
    'class' => 'yii\grid\ActionColumn',
    
],
          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

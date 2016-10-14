<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Certificado */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Certificado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este certificado?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'evento_id',
            'tema_id',
            'user_id',
            'fecha',
            'tipo',
            'codigo',
            'descripcion:ntext',
            'estado',
        ],
    ]) ?>

</div>

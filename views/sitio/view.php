<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sitio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sitio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar el sitio creado?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'expositor_id',
            'tema_id',
            'nombre',
            'descripcion:ntext',
            'estado',
        ],
    ]) ?>

</div>

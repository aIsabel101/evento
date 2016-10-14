<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Expositor */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Expositor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expositor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este expositor?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'user_id',
            'nombre',
            //'archivo',
            'estado',
        ],
    ]) ?>

</div>

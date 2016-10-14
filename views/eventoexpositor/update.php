<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\eventoExpositor */

$this->title = 'Editar Cronograma: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Cronograma', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="evento-expositor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

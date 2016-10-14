<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paquete */

$this->title = 'Editar Paquete: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Paquete', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="paquete-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

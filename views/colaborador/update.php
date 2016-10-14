<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Colaborador */

$this->title = 'Actualizar Colaborador: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Colaborador', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="colaborador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

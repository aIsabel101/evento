<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */

$this->title = 'Actualizar Configuración: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Configuracion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="configuracion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

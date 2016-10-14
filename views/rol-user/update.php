<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolUser */

$this->title = 'Editar Rol Usuario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rol Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="rol-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

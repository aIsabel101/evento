<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tema */

$this->title = 'Actualizar Tema: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tema', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tema-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
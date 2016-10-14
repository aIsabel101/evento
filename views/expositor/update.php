<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expositor */

$this->title = 'Editar Expositor: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Expositor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="expositor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

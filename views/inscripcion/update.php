<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inscripcion */

$this->title = 'Editar Inscripción: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inscripción', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="inscripcion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Acreditacion */

$this->title = 'Update Acreditacion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acreditacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acreditacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

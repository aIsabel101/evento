<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoPaquete */

$this->title = 'Crear Tipo Paquete';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Paquete', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-paquete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

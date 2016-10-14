<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Paquete */

$this->title = 'Crear Paquete';
$this->params['breadcrumbs'][] = ['label' => 'Paquete', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paquete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

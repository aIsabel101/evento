<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Preinscripcion */

$this->title = 'Create Preinscripcion';
$this->params['breadcrumbs'][] = ['label' => 'Preinscripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preinscripcion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

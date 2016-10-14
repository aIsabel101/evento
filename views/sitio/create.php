<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sitio */

$this->title = 'Crear Sitio';
$this->params['breadcrumbs'][] = ['label' => 'Sitio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sitio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

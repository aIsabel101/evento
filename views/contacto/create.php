<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = 'Crear Contacto';
$this->params['breadcrumbs'][] = ['label' => 'Contacto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

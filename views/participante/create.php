<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Participante */

$this->title = 'Crear Participante';
$this->params['breadcrumbs'][] = ['label' => 'Participante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participante-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

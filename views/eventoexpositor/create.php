<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\eventoExpositor */

$this->title = 'Cronograma';
$this->params['breadcrumbs'][] = ['label' => 'Cronograma', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-expositor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

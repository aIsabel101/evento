<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tema */

$this->title = 'Crear Tema';
$this->params['breadcrumbs'][] = ['label' => 'Tema', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tema-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

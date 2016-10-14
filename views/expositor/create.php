<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Expositor */

$this->title = 'Registrar Expositor';
$this->params['breadcrumbs'][] = ['label' => 'Expositor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expositor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

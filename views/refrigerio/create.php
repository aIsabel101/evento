<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Refrigerio */

$this->title = 'Create Refrigerio';
$this->params['breadcrumbs'][] = ['label' => 'Refrigerios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refrigerio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

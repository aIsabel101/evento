<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RolUser */

$this->title = 'Crear Rol Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Rol Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

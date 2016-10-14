<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Acreditacion */

$this->title = 'Create Acreditacion';
$this->params['breadcrumbs'][] = ['label' => 'Acreditacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acreditacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

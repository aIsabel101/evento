<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recurso', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
   <tbody>
   <!-- Aplicadas en las celdas (<td> o <th>) -->
  <tr>
      <td class="active">Evento:</td>
    <td class="info">  <?php echo  $model->evento->nombre; ?></td>
<!--    <td class="active">Colaborador:</td>
    <td class="info"> <?php //echo   $model->colaborador_id ?> </td>
    
  </tr>
  
   <tr>
      <td class="active">Tema:</td>
    <td class="info">  <?php //echo  $model->tema->nombre; ?></td>
    <td class="active">Nombre:</td>-->
          <td class="active">Tipo Recurso:</td>

    <td class="info"> <?php echo   $model->tipo ?> </td>
         
    </tr>
    
    <tr>
        <td class="active">Nombre:</td>

    <td class="info"> <?php echo   $model->nombre ?> </td>
    
  
  
 
 
      <td class="active">Cantidad:</td>
    <td class="info"> <?php echo   $model->cantidad?> </td>
   </tr>

    <tr>
    <td class="active">Fecha:</td>
    <td class="info"> <?php echo   $model->fecha?> </td>
      
   
      <td class="active">Detalle:</td>
    <td class="info"> <?php echo   $model->detalle?> </td>
      
  </tr>
  
  
</tbody>
  </table>
</div>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           //'id',
           // 'evento_id',
            //'colaborador_id',
          //'tema_id',
            //'nombre',
            //'cantidad',
            //'fecha',
           //'detalle:ntext',
        ],
    ]) ?>

</div>

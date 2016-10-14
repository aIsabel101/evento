<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php
        if(\app\models\User::hasAcess("evento",'update'))
        {
        ?>
        
       <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php }  ?>
        
 
       
      
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
        
        <?= Html::a('Cronograma', ['cronograma', 'id' => $model->id], ['class' => '.btn-success']) ?>
    </p>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
   <tbody>
   <!-- Aplicadas en las celdas (<td> o <th>) -->
  <tr>
      <td class="active"> Tipo Evento:</td>
    <td class="info">  <?php echo  $model->tipoEvento->nombre; ?></td>
    <td class="active">Nombre:</td>
    <td class="info"> <?php echo   $model->nombre?> </td>
    
  </tr>
  
  <tr>
      
       <td class="active">Tema Principal:</td>
    <td class="info"> <?php echo   $model->tema_principal?> </td>
     <td class="active">Estado :</td>
    <td class="info"> <?php echo   $model->estado?> </td>
  </tr>
  <tr>
    <td class="active">Fecha inicio:</td>
    <td class="info"> <?php echo   $model->fecha_inicio?> </td>
    <td class="active">Fecha fin:</td>
    <td class="info">  <?php echo  $model->fecha_fin?></td>
   
   
  </tr>
  
  <tr>
       <td class="active">Horas Académicas:</td>
    <td class="info">  <?php echo  $model->horas?></td>
    
      <td class="active">Requisitos:</td>
    <td class="info">  <?php echo  $model->requisitos?></td>
    
  </tr>
  <tr>
      <td class="active">Dirección:</td>
    <td class="info"> <?php echo   $model->nombre_direccion?> </td>
    <td class="active"> Cantidad Asistentes:</td>
    <td class="info">  <?php echo  $model->cantidad; ?></td>
      
  </tr>
  
  
  <tr>
      <td class="active">Logo:</td>
     <td class="info">  <?= Html::img($model->logo);?> </td>
  
  </tr>
  
  
</tbody>
  </table>
        
            </tr> 
   

    
         
</div>


</div>

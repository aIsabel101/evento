<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Expositor;
use app\models\EventoExpositor;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Evento */


//echo $model->nombre;
//echo $model->id;

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
        
 <?= Html::a('Agregar Expositor', ['agregarcronograma', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
      
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
      <td class="active">Expositor:</td>
      <td class="info"> <?php 
 foreach ($model->eventoExpositors as $expo)
      {
          echo $expo->expositor->user->nombre;
      }
      
      
      ?> 
  </tr>
  
  <tr>
      <td class="active">Tema:</td>
      <td class="info"> <?php 
 foreach ($model->eventoExpositors as $expo)
      {
          echo $expo->expositor->user->nombre;
      }
      
      
      ?> 
    <td class="active">Fecha inicio:</td>
    <td class="info"> <?php echo   $model->fecha_inicio?> </td>
    <td class="active">Fecha fin:</td>
    <td class="info">  <?php echo  $model->fecha_fin?></td>
   
   
  </tr>
  
  
  
  
  
  
  
  
</tbody>
  </table>
</div>
    
  
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            
           // 'costo',
            
          //  'latitud',
           // 'longitud',
            
        ],
    ]) ?>

</div>

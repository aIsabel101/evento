<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-viewcronograma">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
   
      
    </p>

<div class="table-responsive">
  
   <!-- Aplicadas en las celdas (<td> o <th>) -->
      <table class="table table-bordered"> 
        <thead>
            <tr> <th>#</th> 
                <th> Expositor</th> 
                
                <th>Horario</th> 
               
            </tr> 
        </thead>
        <tbody> 
         


      <?php 
 foreach ($model->eventoExpositors as $expo)
      {
           echo '<tr>';
     $expositorevento= $expo->expositor;
      echo  '<td></td>'; 
      echo  '<td>'.$expositorevento->user->nombre.'</td>'; 
       echo  '<td>';
      
       $fecha='';
       ?>
         <table class="table table-bordered"> 
        <thead>
            <tr> <th>Tema</th> 
                <th> Fecha</th> 
                <th>Hora Inicio</th> 
                <th>Hora Fin</th> 
                <th>Observación</th> 
               
            </tr> 
        </thead>
             <tbody> 
                 <?php
     foreach ($expositorevento->temaExpositors as $temaexpositor)
     {
         ?> 
      
          
       
         <tr>   
             <td> <?=$temaexpositor->tema->nombre?></td> 
              <td> <?=$temaexpositor->fecha_inicio?></td> 
               <td> <?=$temaexpositor->hora_inicio?></td> 
                <td> <?=$temaexpositor->hora_fin?></td> 
                 <td> <?=$temaexpositor->estado?></td> 
            
           </tr> 
         
         
       <?php 
     }
     ?>
      </tbody>
    </table>
     </td>
        </tr>
        <?php
      }
      
      
      
      ?> 
       
           
             </tbody>
  </tr>
  
</tbody>
  </table>
</div>
 
       
        <?= Html::a('Agregar Cronograma', ['cronograma', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
  <?= Html::a('Pdf', ['pdf', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
</div>

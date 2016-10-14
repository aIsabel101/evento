<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Acreditar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="acreditacion-acreditar">
  <h1><?= Html::encode($this->title) ?></h1>
  
  <div class="table-responsive">
     <table class="table table-bordered"> 
        <thead>
            <tr>
                <th>Nombre</th> 
                <th>Apellido p</th> 
                 <th>Apellido m</th> 
                  <th> ci</th> 
                              
            </tr> 
             </thead>
             <tbody> 
            <?php
    foreach ($model->inscripcions as $incrip)
     {
         ?> 
      
          
       
         <tr>   
             <td> <?=$incrip->user->nombre?></td> 
              <td> <?=$incrip->user->apellido_paterno?></td> 
               <td> <?=$incrip->user->apellido_materno?></td> 
                <td> <?=$incrip->user->ci?></td> 
                
            
           </tr> 
         
         
       <?php 
     }
     ?>
            </tbody>
          </table>
  </div>
  <div class="table-responsive">
 
     <?= Html::a('Volver', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    
</div>
  
</div>

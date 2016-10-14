<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Inscripcion;
/* @var $this yii\web\View */
/* @var $model app\models\Acreditacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acreditacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acreditacion-view">

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

    <?= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'inscripcion_id',
//            'user_id',
//            'estado',
//        ],
    ]) ?>

</div>

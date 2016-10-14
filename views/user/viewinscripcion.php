<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Evento;
use app\models\Paquete;
use app\models\Inscripcion;
use app\models\User;
use dosamigos\qrcode\formats\MailTo;
use dosamigos\qrcode\QrCode;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="user-viewinscripcion">

<h1><?= Html::encode($this->title) ?></h1>

<div class="table-responsive">
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>#</th>
              <th>Evento</th>
              <th>Inscripción</th>

          </tr>
       </thead>
       
       <?php
       foreach ($model->inscripcions as $incrip)
              {
            echo '<tr>';
            $incrip->evento->nombre;
            echo  '<td></td>'; 
            echo  '<td>'.$incrip->evento->nombre;
            echo  '<td>'; 
       ?>
       <table class="table table-bordered"> 
        <thead>
                <tr> <th>Nombre</th> 
                    <th> A.Paterno</th> 
                    <th> A.Materno</th>
                    <th> Paquete</th>
                    <th>Monto</th>
                    <th>Qr</th>
              
            </tr> 
        </thead>
      
        <tbody>
            <?php
            {
              ?>  <tr>
                <td><?=$incrip->user->nombre;?></td> 
                <td><?=$incrip->user->apellido_paterno;?></td> 
                <td><?=$incrip->user->apellido_materno;?></td> 
                <td><?=$incrip->paquete->nombre;?></td>
                <td><?= $incrip->monto;?></td>
                <td> <?= Html::img(Yii::$app->request->baseUrl.'/qr/005_file_'. md5($incrip->codigoBar).'.png');?></td>
                 
                <td>
                             </br>
                             <a href="/evento/web/index.php?r=user/deleteinscripcion&id=<?= $incrip->id?>" title="Eliminar" aria-label="Eliminar" data-confirm="¿Está seguro de eliminar este elemento?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
               </br>
               
               
               <a href="#" data-toggle="modal" data-target="#inscripcion_id_<?= $incrip->id ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="inscripcion_id_<?= $incrip->id ?>">
                      <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Eliminar </h4>
                              </div>
                              <div class="modal-body">
                                    <p>¿Realmente deseas eliminar la inscripción <?= $incrip->id ?>?</p>
                              </div>
                              <div class="modal-footer">
                              <//?= Html::beginForm(Url::toRoute("user/deleteinscripcion"), "POST") ?>
                                    <input type="hidden" name="inscripcion_id" value="<?= $incrip->id ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                              <//?= Html::endForm() ?>
                              </div>
                            </div>  
                      </div>  
            </div> 
        </td> 
                  </tr>
              
          <?php
          }
          ?>
          
        </tbody>
       </table>
           <?php
              }
           ?>
          
      <tbody>
   <!-- Aplicadas en las celdas (<td> o <th>) -->
  <tr>
<!--    <td class="active">Nombre:</td>
    <td class="info"> //<?php  echo   $model->id; ?> </td>-->
      
 
</tbody>
  </table>
        
            </tr> 
         <?= Html::a('Volver <--', ['inscripcion', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Pdf', ['pdf', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
       
</div>
</div>

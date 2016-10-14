<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if(\app\models\User::hasAcess("user",'create'))
        {
        ?>
        
        <?= Html::a('Registrar Usuario', ['create'], ['class' => 'btn btn-success']) ?>
        <?php }  ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=> function($model){
            if($model->estado =='Inactivo')
            {
                return ['class'=>'danger'];
            } else {
                 return ['class'=>'success'];
            }
        
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'ci',
            /*fecha_nacimiento',*/
            /*'genero',*/
            //'username',
            //'password',
            /*'email:email',*/
            /*'telefono',
            'ocupacion',*/
            /*'direccion:ntext',*/
            'estado',
[
    'class' => 'yii\grid\ActionColumn',
    'template' => '{inscripcion} {view} {update} {delete}',
    'buttons' => [
        'inscripcion' => function ($url, $modelinscripcion) {
            return Html::a(
                '<span class="glyphicon glyphicon-qrcode"></span>',
                $url, 
                [
                    'title' => 'Inscripción',
                   'data-pjax' => '0',
                ]
            );
        },
                
         'acreditacion' => function ($url, $modelacreditacion) {
            return Html::a(
                '<span class="glyphicon glyphicon-ok"></span>',
                $url, 
                [
                    'title' => 'Acreditación',
                   'data-pjax' => '0',
                ]
            );
        },       
                
                
                
                
                
                
                
    ],
],
          //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

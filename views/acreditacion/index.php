<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AcreditacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acreditacion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acreditacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar Acreditacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'inscripcion_id',
            'user_id',
            'estado',

              [  
        'class' => 'yii\grid\ActionColumn',
   
        'template'=>'{acreditar}{update}{view}{delete}',
         'buttons'=>[
             
             'acreditar'=> function($url, $model){
             return Html::a(
                     '<span class="glyphicon glyphicon-save-file"></span>',
                     $url,
                     [
                         'tittle'=>'acreditar',
                         'data-pjax' => '0',
                        
                     ]
                     
                     );
             }, 
                    
             
         ],
            ], ],
        
    ]); ?>

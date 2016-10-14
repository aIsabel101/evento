<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Eventos Academicos',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Acerca de', 'url' => ['/site/about']],
            ['label' => 'Contacto', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Iniciar sesion', 'url' => ['/site/login']] :
                [
                    'label' => 'Cerrar sesion (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
     
        
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div  class="col-lg-3" >
            
            
             <ul class="nav nav-pills nav-stacked">

                 <li role="presentation" ><a href="index.php?r=tipo-evento">Tipo de Evento</a></li>
 <li role="presentation" class="active"><a href="index.php?r=evento">Evento</a></li>
 <li role="presentation" ><a href="index.php?r=user">Usuarios</a></li>
 <li role="presentation" ><a href="index.php?r=tipousuario">Roles</a></li>
  
   <li role="presentation"><a href="index.php?r=user">Usuarios</a></li>
 <li role="presentation" ><a href="index.php?r=refrigerio">Refrigerio</a></li>
 <li role="presentation" ><a href="index.php?r=notificacion">Notificación</a></li>
 <li role="presentation" ><a href="index.php?r=acreditacion">Acreditación</a></li>
 <li role="presentation" ><a href="index.php?r=tipo-paquete">Tipo de paquete</a></li>
 <li role="presentation" ><a href="index.php?r=inscripcion">Inscripción</a></li>
 <li role="presentation" ><a href="index.php?r=actividad">Actividad</a></li>
          </ul>
            
        </div>
        
        <div  class="col-lg-9" >
                    <?= $content ?>
        </div>
        
        

        
        </div>
        
        
        
        
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

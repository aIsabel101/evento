<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    
    
    
    <link rel="stylesheet" href="css/jquery-ui-1.8.20.custom.css" type="text/css" />
  <script type="text/javascript" src="js/jquery.corner.js"></script>
  <script type="text/javascript" src="js/paginador/jquery.js"></script>
  <!--script type="text/javascript" src="js/jquery-1.7.2.min.js"></script-->
  <script type="text/javascript" src="js/jquery-ui-1.8.20.js"></script>
       <style type="text/css">
   /*.slideshow {  height: 100px; width: 100%; margin-bottom: 15px; }  */
    .slideshow img {width: 100%; height: 405px; border-radius: 14px;}
    </style>
    <!-- include Cycle plugin -->
  <script type="text/javascript" src="js/jquery.cycle.all.2.74.js"></script>
   <script type="text/javascript">   /*con esto me muestra las imagenes como una presentacion*/
    $(document).ready(function() {
        $('.slideshow').cycle({
    		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
    	});
    });

    $(function(){
			// Accordion  el # significa llamar a un id
			$("#accordion").accordion({ header: "h6",collapsible: true});
        });
     $("#contenedor").corner("50px");
   $("#showImg").corner("dog3 100|px");

    //$("article").corner("wicked 30px");

    </script>

    
    
    
</head>
<body>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
/* @var $this yii\web\View */
?>
<h1>cronograma/index</h1>


<?php


    use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */


echo $model->nombre;
echo $model->id;


?>
<?php   ?>

<form action="" method="post">
    <label>Tema</label>
    <input type="hidden" value="<?php echo $model->id ?>" />
    <input type="text" name="tema"/>
    <input type="submit" value="guardar"/>
</form>










<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</p>

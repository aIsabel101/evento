<?php

namespace app\controllers;
use Yii;
use app\models\Evento;
use app\models\EventoSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class CronogramaController extends \yii\web\Controller
{
 public $layout = "admin";
    
    public function actionIndex()
    {
        
            $searchModel = new EventoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
       
    }
     public function actionShow()
    {
        return $this->render('index');
    }
     public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    protected function findModel($id)
    {
        if (($model = Evento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

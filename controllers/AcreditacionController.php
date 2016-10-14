<?php

namespace app\controllers;

use Yii;
use app\models\Acreditacion;
use app\models\AcreditacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AcreditacionController implements the CRUD actions for Acreditacion model.
 */
class AcreditacionController extends Controller
{
    /**
     * @inheritdoc
     */
     public $layout = "admin";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Acreditacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AcreditacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Acreditacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Acreditacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Acreditacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Acreditacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
 public function actionAcreditar($id)
    
    {
           
            $model =   $this->findModel($id);
            $modelinscripcion= new \app\models\Inscripcion();
           if ($modelinscripcion->load(Yii::$app->request->post()))
           {
               if($modelinscripcion->save())
               {
                return $this->render('inscritos', [
                'model' => $model
                ]); 
                   
               }else
               {
                return $this->render('inscritos', [
                'model' => $model,'modelinscripcion'=>$modelinscripcion
                 ]);
               }
           }
               return $this->render('inscritos', [
                'model' => $model,'modelinscritos'=>$modelinscripcion
               ]);
    }
    /**
     * Deletes an existing Acreditacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Acreditacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Acreditacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Acreditacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

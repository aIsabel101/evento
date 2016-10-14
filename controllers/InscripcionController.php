<?php

namespace app\controllers;

use Yii;
use app\models\Inscripcion;
use app\models\InscripcionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Participante;
use app\models\User;
use app\models\Acreditacion;
use app\models\Evento;
/**
 * InscripcionController implements the CRUD actions for Inscripcion model.
 */
class InscripcionController extends Controller
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
     * Lists all Inscripcion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InscripcionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inscripcion model.
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
     * Creates a new Inscripcion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inscripcion();

        if ($model->load(Yii::$app->request->post())) {
            
             $model->save();
           $acreditacionsave= new \app\models\Acreditacion();
           $acreditacionsave->user_id=$_POST['acreditacion_id'];
           $acreditacionsave->inscripcion_id=$model->id;
           $acreditacionsave->save();
               
            
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inscripcion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing Inscripcion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
  public function actionAcreditacion($id)
    {
          
           $model =   $this->findModel($id);

           $modelacreditacion=new \app\models\Acreditacion();
           
            if ($modelacreditacion->load(Yii::$app->request->post()))
           {
               
              
               
               
               if($$modelacreditacion->save())
               {
                     return $this->render('view', [
                'model' => $model
            ]); 
                   
               }else
               {
                    return $this->render('acreditacion', [
                'model' => $model,'acreditacion'=>$modelacreditacion
            ]);
               }
               
               
           }
    return $this->render('acreditacion', [
                'model' => $model,'acreditacion'=>$modelacreditacion
            ]);
    
               }
    
    /**
     * Finds the Inscripcion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inscripcion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inscripcion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

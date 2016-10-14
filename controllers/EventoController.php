<?php

namespace app\controllers;

use Yii;
use app\models\Evento;
use app\models\EventoSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;
use app\models\Acreditacion;
use app\models\Inscripcion;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use mPDF;
/**
 * EventoController implements the CRUD actions for Evento model.
 */
class EventoController extends Controller

{
    public $layout = "admin";
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ['access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete','index','download'],
                'rules' => [
                    [  'actions' => ['create', 'update', 'delete','index','download'],
                       'allow' => true,
                       'roles' => ['@'],
                       'matchCallback' => function ($rule, $action) {
                       return User::getAcces($rule,$action);
                    }
                    ],
                     
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Evento models.
     * @return mixed
     */
    public function actionIndex()
    {
       // \yii\web\User::ROLE_EXPOSITOR;
        $searchModel = new EventoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Evento model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
      public function actionAcreditar($id)
    {
          //echo $id;
          


          $incripcion= Inscripcion::find() ->where(['id' => $id])->one();
          //echo $incripcion->id." ".$incripcion->user_id;
          $acrditar= new Acreditacion();
          $acrditar->inscripcion_id=  $incripcion->id;
          $acrditar->user_id=$incripcion->user_id;
          $acrditar ->estado=  Acreditacion::ESTA_ACRE;
          $acrditar->save();
        //  var_dump( $acrditar->errors);
         // die();
            $model =   $this->findModel($incripcion->evento_id);
            $modelinscripcion= new \app\models\Inscripcion();
          return $this->render('inscritos', [
                'model' => $model,'modelinscripcion'=>$modelinscripcion
                 ]);
       
    }
     public function actionViewcronograma($id)
    {
        return $this->render('viewcronograma', [
            'model' => $this->findModel($id),
        ]);
    }

     public function actionInscritos($id)
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
     * Creates a new Evento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */public function actionCreate()
    {
        $model = new Evento();

        
        
         if (yii::$app->request->isAjax && $model->load(yii::$app->request->post())) 
             
             {
             yii::$app->response->format='json';
             return ActiveForm::validate($model); 
           }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             
             $imageName = $model->nombre;
  
                $model->file = UploadedFile::getInstance($model,'file');
                $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension );
  // para la db
                	
            $model->logo = 'uploads/'.$imageName.'.'.$model->file->extension;
            $model->file = 'uploads/'.$imageName.'.'.$model->file->extension;
            $images="";//'uploads/'.$imageName.'.'.$model->file->extension ;
          //  $model->
            $model->save();
            
           
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
       
      public function actionValidatedation()
      {
            $model = new Evento();
          
    if (yii::$app->request->isAjax && $model->load(yii::$app->request->post())) 
             
             {
             yii::$app->response->format='json';
             return ActiveForm::validate($model); 
             
                 
            }
  
    }
    
    /**
     * Updates an existing Evento model.
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

    /**
     * Deletes an existing Evento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     public function actionCronograma($id)
    {
           
           $model =   $this->findModel($id);

           $modeltemaexpositor= new \app\models\TemaExpositor();
           
           if ($modeltemaexpositor->load(Yii::$app->request->post()))
           {
               $modeltemaexpositor->hora_inicio=$_POST['hora_inicio'];
               $modeltemaexpositor->hora_fin=$_POST['hora_fin'];
               
               
            if($modeltemaexpositor->save())
            {
                     return $this->render('viewcronograma', [
                'model' => $model
            ]); 
                   
                   }else
               {
                    return $this->render('cronograma', [
                'model' => $model,'modeltemaexpositor'=>$modeltemaexpositor
            ]);
               }
               
               
           }
                      return $this->render('cronograma', [
                'model' => $model,'modeltemaexpositor'=>$modeltemaexpositor
            ]);
          /** 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
        } else {
            return $this->render('agregarcronograma', [
                'model' => $model,
            ]);
        }
        */
    }
 public function actionPdf($id) {
         $model =   $this->findModel($id);
         $cadena=       ' <table class="table table-bordered">';
         $cadena.='<thead>
                <tr>    <th>#</th> 
                        <th> Expositor</th> 
                        <th>Horario</th> 
               
                </tr> 
        </thead>
        <tbody>';

     foreach ($model->eventoExpositors as $expo)
      {
             $cadena.= '<tr>';
             $expositorevento= $expo->expositor;
             $cadena.=  '<td></td>'; 
             $cadena.=  '<td>'.$expositorevento->user->nombre.'</td>'; 
             $cadena.=  '<td>';
             $fecha='';
             $cadena.=' <table class="table table-bordered"> 
        <thead>
            <tr> <th>Tema</th> 
                <th> Fecha</th> 
                <th>Hora Inicio</th> 
                <th>Hora Fin</th> 
                <th>Observación</th> 
            </tr> 
        </thead>
           <tbody>';
               
     foreach ($expositorevento->temaExpositors as $temaexpositor)
     {
                $cadena .='<tr>';
                $cadena.='<td>'. $temaexpositor->tema->nombre.'</td>';
                $cadena.='<td>'. $temaexpositor->fecha_inicio.'</td>'; 
                $cadena.='<td>'. $temaexpositor->hora_inicio.'</td>'; 
                $cadena.= '<td>'. $temaexpositor->hora_fin.'</td>'; 
                $cadena.= '<td>' .$temaexpositor->estado.'</td>'; 
                $cadena.='</tr>'; 
    }
                 $cadena.='  </tbody>
    </table>
     </td>
        </tr>';
    }
                 $cadena.='</tbody>
        </tr>
            </tbody>
            </table>';
        $mpdf = new mPDF;
        $mpdf->WriteHTML('<p>Cronograma</p>'.  $cadena);
        $mpdf->Output();
        exit;
    }  
    public function actionCreateMPDF(){

        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf'));
        $mpdf->Output();
        exit;
        //return $this->renderPartial('mpdf');
    }
    public function actionSamplePdf() {
        $mpdf = new mPDF;
       $mpdf->WriteHTML('Sample Text');
       $mpdf->Output();
        exit;
   }
    public function actionForceDownloadPdf(){
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf'));
        $mpdf->Output('MyPDF.pdf', 'D');
        exit;
    }

    
    
    
    /**
     * Finds the Evento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Evento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    
    
    protected function findModel($id)
    {
        if (($model = Evento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

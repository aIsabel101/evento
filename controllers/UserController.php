<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Permiso;
use app\models\Inscripcion;
use app\models\Acreditacion;
use dosamigos\qrcode\formats\MailTo;
use dosamigos\qrcode\QrCode;
use mPDF;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;


/**
 * UserController implements the CRUD actions for User model.
 */
    class UserController extends Controller
{
        public $layout = "admin";
    public function behaviors()
    {
        return [   'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete','index'],
                'rules' => [
                    [  'actions' => ['create', 'update', 'delete','index'],
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
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
        public function actionViewinscripcion($id)
    {
        return $this->render('viewinscripcion', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
             $rolusersave= new \app\models\RolUser();
             $rolusersave->tipousuario_id=$_POST['rol_id'];
             $rolusersave->user_id=$model->id;
             $rolusersave->save();
               
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
     public function actionDeleteinscripcion( $id )
    {
         
        
      
      // $inscripciom->delete();
       
       $iduser=0;
        if(Yii::$app->request->post())
        {
             $inscripciom= Inscripcion::find()->where(['id' => $id])->one();
             
             $inscripciom->delete();
        $iduser =  $inscripciom->user_id;
        
        }
         return $this->render('viewinscripcion', [
            'model' => $this->findModel($iduser),
        ]);
        
        
    }
    public function actionQrcode() {
    $mailTo = new MailTo(['email' => 'email@example.com']);
    return QrCode::png($mailTo->getText());
    // you could also use the following
    // return return QrCode::png($mailTo);
}
    public function actionInscripcion($id)
    {
        $model = $this->findModel($id);
          $modelinscripcion= new \app\models\Inscripcion();
           
           if ($modelinscripcion->load(Yii::$app->request->post()))
           {
                            
               //$modelinscripcion->codigoBar=$_POST['codigoBar'];
               //$modelinscripcion->monto=$_POST['monto'];
               $modelinscripcion->user_id=$model->id;
//               $modelinscripcion->save();
                $var=  Inscripcion::findOne(array('user_id'=>$model->id,'evento_id'=>$modelinscripcion->evento_id ));
              
              
          if(count($var)==0){//count($var)==0){  
              
               if($modelinscripcion->save())
               {
                   
               $participante= new \app\models\Participante();
               $participante->inscripcion_id=$modelinscripcion->id;
               $participante->user_id=$model->id;
               $participante->save();
               
               $modelinscripcion->codigoBar= $model->id.'-'.$participante->id.'-'.$modelinscripcion->id.'-'.$modelinscripcion->evento_id.'-'.md5($model->id);
               $modelinscripcion->save();
               $fileName = '005_file_'.md5($modelinscripcion->codigoBar).'.png'; 

//             $pngAbsoluteFilePath =  __DIR__. DIRECTORY_SEPARATOR .$fileName;
                $pngAbsoluteFilePath =  __DIR__. DIRECTORY_SEPARATOR ."../web/qr/".$fileName; 
//              $pngAbsoluteFilePath =  __DIR__. DIRECTORY_SEPARATOR ."../images/".$fileName; 

               QrCode::png($modelinscripcion->codigoBar,$pngAbsoluteFilePath);
                   
               return $this->render('viewinscripcion', [
                'model' => $model
            ]); 
                   
               }else
               {
                    return $this->render('inscripcion', [
                'model' => $model,'modelinscripcion'=>$modelinscripcion
            ]);
               }
               
           }else{
                   return $this->redirect(['viewinscripcion', 'id' => $model->id]);
           }           
             }
    
               
           
      return $this->render('inscripcion', [
                'model' => $model,'modelinscripcion'=>$modelinscripcion
            ]);
    
     
    }
    
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
     
     public function actionPdf($id) {
      $model =   $this->findModel($id);
         $cadena=       ' <table class="table table-bordered">';
         $cadena.='<thead>
                <tr>    <th>#</th>
                        <th>Evento</th>
                        <th></th>
                          <th>Nombre</th> 
                <th> A.Paterno</th> 
                <th> A. Materno</th>
                <th> Paquete</th>
                <th> Monto</th>
                <th> Codigo</th>

                </tr> 
        </thead>
        <tbody>';
    foreach ($model->inscripcions as $incrip)
      {
             $cadena.= '<tr>';
//             $incrip->evento->nombre;
             $cadena.=  '<td></td>'; 
             $cadena.=  '<td>'.$incrip->evento->nombre; 
             $cadena.=  '<td>  ';
              
   $cadena.='<td>'. $incrip->user->nombre.'</td>';
                $cadena.='<td>'. $incrip->user->apellido_paterno.'</td>'; 
                $cadena.='<td>'. $incrip->user->apellido_materno.'</td>'; 
                $cadena.= '<td>'. $incrip->paquete->nombre.'</td>'; 
                $cadena.= '<td>' .$incrip->monto.'</td>';
                $cadena.= '<td>' .Html::img(Yii::$app->request->baseUrl.'/qr/005_file_'. md5($incrip->codigoBar).'.png').'</td>     </tr>';
           

      }
                 $cadena.='</tbody>
      
        
       
            </table>';
        $mpdf = new mPDF;
        $mpdf->WriteHTML('<p>Inscripción</p>'.  $cadena);
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

    
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $ci
 * @property string $fecha_nacimiento
 * @property string $genero
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $telefono
 * @property string $ocupacion
 * @property string $direccion
 * @property string $estado
 *
 * @property Acreditacion[] $acreditacions
 * @property Asistencia[] $asistencias
 * @property Certificado[] $certificados
 * @property Colaborador[] $colaboradors
 * @property Expositor[] $expositors
 * @property Ingreso[] $ingresos
 * @property Inscripcion[] $inscripcions
 * @property Notificacion[] $notificacions
 * @property NotificacionUsuario[] $notificacionUsuarios
 * @property Participante[] $participantes
 * @property Preinscripcion[] $preinscripcions
 * @property RolUser[] $rolUsers
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
  const ROLE_ADMIN = "ADMIN";
  const ROLE_COLABORADOR = "COLABORADOR";
  const ROLE_EXPOSITOR = "EXPOSITOR";
  const ROLE_PARTICIPANTE = "PARTICIPANTE";
  const  ROLE_EXPOSITORID=4;
   const ROLE_ADMINID=1;
  const ROLE_COLABORADORID=3;
   const ROLE_PARTICIPANTEID=6;


  
  
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
//            [['nombre', 'apellido_paterno', 'apellido_materno', 'ci', 'email','username', 'password', 'estado' ], 'required'],
            ['nombre', 'required', 'message'=>'Campo Requerido'],
            ['nombre', 'match','pattern'=>"/^.(3,50)+$/", 'message'=>'Minimo 3 maximo 50 caracteres'],
            ['apellido_paterno', 'required', 'message'=>'Campo Requerido'],
            ['apellido_paterno', 'match','pattern'=>"/^.(3,50)+$/", 'message'=>'Minimo 3 maximo 50 caracteres'],
            ['apellido_materno', 'required', 'message'=>'Campo Requerido'],
            ['apellido_materno', 'match','pattern'=>"/^.(3,50)+$/", 'message'=>'Minimo 3 maximo 50 caracteres'],
            [['fecha_nacimiento'], 'safe'],
            [['telefono'], 'integer'],
            ['email', 'email', 'message'=>'Formato no valido'],
            [['direccion'], 'string'],
            [['nombre', 'apellido_paterno', 'apellido_materno', 'ci', 'email', 'ocupacion'], 'string', 'max' => 45],
            [['genero'], 'string', 'max' => 11],
            [['username'], 'string', 'max' => 50],
            ['username', 'required', 'message'=>'Campo Requerido'],
            ['password', 'required', 'message'=>'Campo Requerido'],
            [['password'], 'string', 'max' => 200],
            ['ci', 'required', 'message'=>'Campo Requerido'],
            [['estado'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           // 'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'ci' => 'CI',
            //'fecha_nacimiento' => 'Fecha Nacimiento',
            //'genero' => 'Género',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            //'email' => 'Dirección de correo electrónico',
            //'telefono' => 'Teléfono',
            //'ocupacion' => 'Ocupación',
            //'direccion' => 'Dirección',
            'estado' => 'Estado',
        ];
    }
       public function getRolName($iduser) {
        echo "Hola mundo";
        $name="";
        
        die();
        $names = Yii::$app->$db->createCommand('SELECT * FROM user u, rol_user r, tipousuario t WHERE u.id=r.user_id and r.tipousuario_id=t.id and u.id='+$iduser) ->queryAll();
                        foreach ($names as $nam){
                    $name= $nam['name'];
                }
                
                return $name;
        
    }
    
    public function hasAcess($controlador,$action) {
        
         $name="";
           $connection = Yii::$app->getDb();
           $names = $connection->createCommand('SELECT t.* FROM user u, rol_user r, tipousuario t WHERE u.id=r.user_id and r.tipousuario_id=t.id and u.id='.Yii::$app->user->id) ->queryAll();
                        foreach ($names as $nam){
                    $name= $nam['nombre'];
                }
                   
        //   echo $this->getRolName(1);
        // var_dump( User::findOne(['id'=> Yii::$app->user->id])->getRolUsers());
         
         return Permiso::getAccess(strtoupper($name), $controlador, $action);
    }
    
       public static  function getAcces($rule,$action) {
     /**
     if(User::findOne(['id'=>Yii::$app->user->id,'rol'=>  User::ROLE_ADMIN]))
        {
         
            return true;
        }else
        {
            return false;
        }
          */
           $name="";
           $connection = Yii::$app->getDb();
           $names = $connection->createCommand('SELECT t.* FROM user u, rol_user r, tipousuario t WHERE u.id=r.user_id and r.tipousuario_id=t.id and u.id='.Yii::$app->user->id) ->queryAll();
                        foreach ($names as $nam){
                    $name= $nam['nombre'];
                }
                //echo $name;
               
        //   echo $this->getRolName(1);
        // var_dump( User::findOne(['id'=> Yii::$app->user->id])->getRolUsers());
         
         return Permiso::getAccess(strtoupper($name), $action->controller->id, $action->id);
       
        
    }
    
/**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
         return static::findOne($id);

    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);

    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $username = strtolower($username);
        return static::findOne(['username' => $username]);
     
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
         return $this->getPrimaryKey();

      //  return $this->id;
    }

     /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return time();
      //   return $this->auth_key;

    }


    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;

       // return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
 
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcreditacions()
    {
        return $this->hasMany(Acreditacion::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistencias()
    {
        return $this->hasMany(Asistencia::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificados()
    {
        return $this->hasMany(Certificado::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaboradors()
    {
        return $this->hasMany(Colaborador::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpositors()
    {
        return $this->hasMany(Expositor::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngresos()
    {
        return $this->hasMany(Ingreso::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacions()
    {
        return $this->hasMany(Notificacion::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacionUsuarios()
    {
        return $this->hasMany(NotificacionUsuario::className(), ['user_id' => 'id']);
    }
    
 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantes()
    {
        return $this->hasMany(Participante::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreinscripcions()
    {
        return $this->hasMany(Preinscripcion::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolUsers()
    {
       
        return $this->hasMany(RolUser::className(), ['user_id' => 'id']);
    }
}

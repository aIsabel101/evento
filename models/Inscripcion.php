<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscripcion".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property integer $paquete_id
 * @property integer $user_id
 * @property string $codigoBar
 * @property string $monto
 *
 * @property Ingreso[] $ingresos
 * @property Evento $evento
 * @property Paquete $paquete
 * @property User $user
 * @property Participante[] $participantes
 */
class Inscripcion extends \yii\db\ActiveRecord
{
    const rutaqr= "controllers";

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id', 'paquete_id', 'monto','user_id'], 'required'],
            [['evento_id', 'paquete_id', 'user_id', 'monto'], 'integer'],
            [['codigoBar'], 'string', 'max' => 800],
            [['monto'], 'string', 'max' => 45],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
            [['paquete_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paquete::className(), 'targetAttribute' => ['paquete_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evento_id' => 'Evento ',
            'paquete_id' => 'Paquete',
            'user_id' => 'Usuario',
            'codigoBar' => 'Codigo ',
            'monto' => 'Monto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngresos()
    {
        return $this->hasMany(Ingreso::className(), ['inscripcion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvento()
    {
        return $this->hasOne(Evento::className(), ['id' => 'evento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquete()
    {
        return $this->hasOne(Paquete::className(), ['id' => 'paquete_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantes()
    {
        return $this->hasMany(Participante::className(), ['inscripcion_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InscripcionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InscripcionQuery(get_called_class());
    }
    
    public   function Qrcode() {
   
    return QrCode::png($this->codigoBar);
    // you could also use the following
    // return return QrCode::png($mailTo);
}


}

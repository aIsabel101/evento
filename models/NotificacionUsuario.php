<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notificacion_usuario".
 *
 * @property integer $id
 * @property integer $notificacion_id
 * @property integer $user_id
 * @property string $fecha
 * @property string $estado
 *
 * @property Notificacion $notificacion
 * @property User $user
 */
class NotificacionUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notificacion_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['notificacion_id', 'user_id'], 'required'],
            [['notificacion_id', 'user_id'], 'integer'],
            [['fecha'], 'safe'],
            [['estado'], 'string', 'max' => 10],
            [['notificacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Notificacion::className(), 'targetAttribute' => ['notificacion_id' => 'id']],
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
            'notificacion_id' => 'Notificacion ID',
            'user_id' => 'User ID',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificacion()
    {
        return $this->hasOne(Notificacion::className(), ['id' => 'notificacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return NotificacionUsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificacionUsuarioQuery(get_called_class());
    }
}

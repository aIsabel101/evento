<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notificacion".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $asunto
 * @property integer $prioridad
 * @property string $mensaje
 *
 * @property User $user
 * @property NotificacionUsuario[] $notificacionUsuarios
 */
class Notificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'prioridad'], 'integer'],
            [['mensaje'], 'string'],
            [['asunto'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'asunto' => 'Asunto',
            'prioridad' => 'Prioridad',
            'mensaje' => 'Mensaje',
        ];
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
    public function getNotificacionUsuarios()
    {
        return $this->hasMany(NotificacionUsuario::className(), ['notificacion_id' => 'id']);
    }
}

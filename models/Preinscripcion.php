<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preinscripcion".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property integer $monto
 * @property string $fecha
 * @property integer $user_id
 *
 * @property Evento $evento
 * @property User $user
 */
class Preinscripcion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preinscripcion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'monto', 'fecha', 'user_id'], 'required'],
            [['evento_id', 'monto', 'user_id'], 'integer'],
            [['fecha'], 'safe'],
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'string', 'max' => 100],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
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
            'evento_id' => 'Evento ID',
            'nombre' => 'Nombre',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'monto' => 'Monto',
            'fecha' => 'Fecha',
            'user_id' => 'User ID',
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return PreinscripcionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PreinscripcionQuery(get_called_class());
    }
}

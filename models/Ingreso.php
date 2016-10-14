<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingreso".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property integer $inscripcion_id
 * @property integer $user_id
 * @property string $nombre
 * @property string $tipo
 * @property string $descripcion
 * @property string $costo
 *
 * @property Evento $evento
 * @property Inscripcion $inscripcion
 * @property User $user
 */
class Ingreso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingreso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id', 'inscripcion_id', 'user_id'], 'required'],
            [['evento_id', 'inscripcion_id', 'user_id'], 'integer'],
            [['nombre', 'tipo', 'descripcion', 'costo'], 'string', 'max' => 45]
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
            'inscripcion_id' => 'Inscripción ID',
            'user_id' => 'User ID',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripción',
            'costo' => 'Costo',
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
    public function getInscripcion()
    {
        return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

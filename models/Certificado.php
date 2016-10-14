<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certificado".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property integer $tema_id
 * @property integer $user_id
 * @property string $fecha
 * @property string $tipo
 * @property string $codigo
 * @property string $descripcion
 * @property string $estado
 *
 * @property Evento $evento
 * @property Tema $tema
 * @property User $user
 */
class Certificado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certificado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id', 'tema_id', 'user_id'], 'required'],
            [['evento_id', 'tema_id', 'user_id'], 'integer'],
            [['fecha'], 'safe'],
            [['descripcion'], 'string'],
            [['tipo'], 'string', 'max' => 45],
            [['codigo'], 'string', 'max' => 200],
            [['estado'], 'string', 'max' => 10]
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
            'tema_id' => 'Tema ID',
            'user_id' => 'User ID',
            'fecha' => 'Fecha',
            'tipo' => 'Tipo',
            'codigo' => 'Codigo',
            'descripcion' => 'Descripción',
            'estado' => 'Estado',
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
    public function getTema()
    {
        return $this->hasOne(Tema::className(), ['id' => 'tema_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

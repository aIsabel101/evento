<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_evento".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $estado
 *
 * @property Evento[] $eventos
 */
class TipoEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 45],
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
            'nombre' => 'Tipo Evento',
            
            'estado' => 'Estado',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['tipo_evento_id' => 'id']);
    }
}

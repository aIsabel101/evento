<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property integer $expositor_id
 * @property integer $tema_id
 * @property string $nombre
 * @property string $archivo
 * @property string $descripcion
 * @property string $estado
 * @property string $fecha
 * @property integer $id_usuario
 *
 * @property Expositor $expositor
 * @property Tema $tema
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expositor_id', 'tema_id'], 'required'],
            [['expositor_id', 'tema_id', 'id_usuario'], 'integer'],
            [['descripcion'], 'string'],
            [['fecha'], 'safe'],
            [['nombre', 'archivo'], 'string', 'max' => 45],
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
            'expositor_id' => 'Expositor ID',
            'tema_id' => 'Tema ID',
            'nombre' => 'Nombre',
            'archivo' => 'Archivo',
            'descripcion' => 'Descripción',
            'estado' => 'Estado',
            'fecha' => 'Fecha',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpositor()
    {
        return $this->hasOne(Expositor::className(), ['id' => 'expositor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(Tema::className(), ['id' => 'tema_id']);
    }
}

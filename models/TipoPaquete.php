<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_paquete".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $estado
 *
 * @property Paquete[] $paquetes
 */
class TipoPaquete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_paquete';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 45],
            //[['estado'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
          //  'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['tipo_paquete_id' => 'id']);
    }
}

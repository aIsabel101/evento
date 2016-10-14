<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuracion".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $fecha
 * @property string $detalle
 * @property string $logo
 */
class Configuracion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuracion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['detalle'], 'string'],
            [['nombre'], 'string', 'max' => 100],
            [['logo'], 'string', 'max' => 45]
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
            'fecha' => 'Fecha',
            'detalle' => 'Detalle',
            'logo' => 'Logo',
        ];
    }
}

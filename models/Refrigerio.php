<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refrigerio".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property string $nombre
 * @property string $estado
 * @property string $detalle
 *
 * @property Evento $evento
 */
class Refrigerio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'refrigerio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id'], 'required'],
            [['evento_id'], 'integer'],
            [['detalle'], 'string'],
            [['nombre', 'estado'], 'string', 'max' => 45],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
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
            'estado' => 'Estado',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvento()
    {
        return $this->hasOne(Evento::className(), ['id' => 'evento_id']);
    }
}

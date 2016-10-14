<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paquete".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property integer $tipo_paquete_id
 * @property string $nombre
 * @property double $monto
 * @property string $fecha_fin
 * @property string $descripcion
 * @property string $estado
 *
 * @property Inscripcion[] $inscripcions
 * @property Evento $evento
 * @property TipoPaquete $tipoPaquete
 */
class Paquete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paquete';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id', 'tipo_paquete_id', 'monto'], 'required'],
            [['evento_id', 'tipo_paquete_id'], 'integer'],
            [['monto'], 'number'],
            [['fecha_fin'], 'safe'],
            [['fecha_fin'], 'compare', 'compareValue'=> date('Y-n-j'), 'operator' => '>='],              
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 45],
            [['estado'], 'string', 'max' => 10],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
            [['tipo_paquete_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPaquete::className(), 'targetAttribute' => ['tipo_paquete_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           // 'id' => 'ID',
            'evento_id' => 'Evento',
            'tipo_paquete_id' => 'Tipo Paquete',
            'nombre' => 'Paquete',
            'monto' => 'Monto',
           // 'fecha_fin' => 'Fecha ',
            'descripcion' => 'Descripción',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['paquete_id' => 'id']);
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
    public function getTipoPaquete()
    {
        return $this->hasOne(TipoPaquete::className(), ['id' => 'tipo_paquete_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recurso".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property integer $colaborador_id
 * @property integer $tema_id
 * @property string $nombre
 * @property integer $cantidad
 * @property string $fecha
 * @property string $detalle
 *
 * @property Egreso[] $egresos
 * @property Colaborador $colaborador
 * @property Evento $evento
 * @property Tema $tema
 */
class Recurso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recurso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['evento_id', 'colaborador_id', 'tema_id', 'nombre', 'cantidad', 'fecha', 'tipo'], 'required'],
            [['evento_id', 'nombre', 'cantidad', 'fecha', 'tipo'], 'required'],
            
            [['colaborador_id', 'tema_id', 'cantidad'], 'integer'],
            [['evento_id','fecha'], 'safe'],
            [['fecha'], 'compare', 'compareValue'=> date('Y-n-j'), 'operator' => '>='],
            [['detalle'], 'string'],
            [['nombre'], 'string', 'max' => 60],
            [['colaborador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Colaborador::className(), 'targetAttribute' => ['colaborador_id' => 'id']],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
            [['tema_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tema::className(), 'targetAttribute' => ['tema_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evento_id' => 'Evento',
           // 'colaborador_id' => 'Colaborador',
            //'tema_id' => 'Tema',
            'tipo' => 'Tipo Recurso',
            'nombre' => 'Nombre',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEgresos()
    {
        return $this->hasMany(Egreso::className(), ['recurso_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColaborador()
    {
        return $this->hasOne(Colaborador::className(), ['id' => 'colaborador_id']);
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
}

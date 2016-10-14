<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tema_expositor".
 *
 * @property integer $id
 * @property integer $expositor_id
 * @property integer $tema_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $estado

 * @property Horario[] $horarios
 * @property Expositor $expositor
 * @property Tema $tema
 */
class TemaExpositor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tema_expositor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expositor_id', 'tema_id', 'fecha_inicio','hora_inicio', 'hora_fin'], 'required'],
            [['expositor_id', 'tema_id'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin'], 'safe'],
            [['fecha_inicio'], 'compare', 'compareValue'=> date('Y-n-j'), 'operator' => '>='],
            [['hora_fin'], 'compare', 'compareAttribute'=>'hora_inicio', 'operator'=>'>=', 'skipOnEmpty'=>true],         
            [['estado'], 'string', 'max' => 100],
            [['expositor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Expositor::className(), 'targetAttribute' => ['expositor_id' => 'id']],
//            [['descripcion'], 'string'],

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
            'expositor_id' => 'Expositor ID',
            'tema_id' => 'Tema ID',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'estado' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horario::className(), ['tema_expositor_id' => 'id']);
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

    /**
     * @inheritdoc
     * @return TemaExpositorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TemaExpositorQuery(get_called_class());
    }
}

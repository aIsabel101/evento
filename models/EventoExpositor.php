<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento_expositor".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property integer $expositor_id
 * @property string $fecha_fin
 * @property string $fecha_ini
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $estado
 *
 * @property Evento $evento
 * @property Expositor $expositor
 */
class EventoExpositor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evento_expositor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id', 'expositor_id'], 'required'],
            [['evento_id', 'expositor_id'], 'integer'],
            [['fecha_fin', 'fecha_ini', 'hora_inicio', 'hora_fin'], 'safe'],
            [['estado'], 'string', 'max' => 10],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
            [['expositor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Expositor::className(), 'targetAttribute' => ['expositor_id' => 'id']],
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
            'expositor_id' => 'Expositor ID',
            'fecha_fin' => 'Fecha Fin',
            'fecha_ini' => 'Fecha Ini',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
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
    public function getExpositor()
    {
        return $this->hasOne(Expositor::className(), ['id' => 'expositor_id']);
    }

    /**
     * @inheritdoc
     * @return EventoExpositorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventoExpositorQuery(get_called_class());
    }
}

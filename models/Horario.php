<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property integer $id
 * @property string $dia
 * @property string $hora_inicio
 * @property string $horario_fin
 * @property integer $tema_expositor_id
 *
 * @property TemaExpositor $temaExpositor
 */
class Horario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tema_expositor_id'], 'required'],
            [['id', 'tema_expositor_id'], 'integer'],
            [['dia'], 'string'],
            [['hora_inicio', 'horario_fin'], 'safe'],
            [['tema_expositor_id'], 'exist', 'skipOnError' => true, 'targetClass' => TemaExpositor::className(), 'targetAttribute' => ['tema_expositor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dia' => 'Dia',
            'hora_inicio' => 'Hora Inicio',
            'horario_fin' => 'Hora Fin',
            'tema_expositor_id' => 'Tema Expositor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemaExpositor()
    {
        return $this->hasOne(TemaExpositor::className(), ['id' => 'tema_expositor_id']);
    }

    /**
     * @inheritdoc
     * @return HorarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HorarioQuery(get_called_class());
    }
}

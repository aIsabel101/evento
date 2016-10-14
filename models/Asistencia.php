<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asistencia".
 *
 * @property integer $id
 * @property string $codigoBar
 * @property integer $evento_id1
 * @property string $fecha
 * @property integer $expositor_id
 * @property integer $user_id
 * @property integer $participante_id
 * @property string $estado
 *
 * @property Evento $eventoId1
 * @property Expositor $expositor
 * @property Participante $participante
 * @property User $user
 */
class Asistencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asistencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigoBar', 'evento_id1', 'fecha', 'expositor_id', 'user_id', 'participante_id', 'estado'], 'required'],
            [['evento_id1', 'expositor_id', 'user_id', 'participante_id'], 'integer'],
            [['fecha'], 'safe'],
            [['codigoBar'], 'string', 'max' => 200],
            [['estado'], 'string', 'max' => 15],
            [['evento_id1'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id1' => 'id']],
            [['expositor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Expositor::className(), 'targetAttribute' => ['expositor_id' => 'id']],
            [['participante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participante::className(), 'targetAttribute' => ['participante_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigoBar' => 'Codigo Bar',
            'evento_id1' => 'Evento Id1',
            'fecha' => 'Fecha',
            'expositor_id' => 'Expositor ID',
            'user_id' => 'User ID',
            'participante_id' => 'Participante ID',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoId1()
    {
        return $this->hasOne(Evento::className(), ['id' => 'evento_id1']);
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
    public function getParticipante()
    {
        return $this->hasOne(Participante::className(), ['id' => 'participante_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return AsistenciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AsistenciaQuery(get_called_class());
    }
}

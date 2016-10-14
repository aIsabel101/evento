<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patrocinador".
 *
 * @property integer $id
 * @property integer $evento_id
 * @property integer $tipo_patrocinador_id
 *
 * @property Evento $evento
 * @property TipoPatrocinador $tipoPatrocinador
 */
class Patrocinador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patrocinador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evento_id', 'tipo_patrocinador_id'], 'required'],
            [['evento_id', 'tipo_patrocinador_id'], 'integer'],
            [['evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['evento_id' => 'id']],
            [['tipo_patrocinador_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPatrocinador::className(), 'targetAttribute' => ['tipo_patrocinador_id' => 'id']],
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
            'tipo_patrocinador_id' => 'Tipo Patrocinador ID',
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
    public function getTipoPatrocinador()
    {
        return $this->hasOne(TipoPatrocinador::className(), ['id' => 'tipo_patrocinador_id']);
    }

    /**
     * @inheritdoc
     * @return PatrocinadorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatrocinadorQuery(get_called_class());
    }
}

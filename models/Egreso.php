<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "egreso".
 *
 * @property integer $id
 * @property integer $acreditacion_id
 * @property integer $recurso_id
 * @property integer $evento_id
 * @property string $nombre
 * @property double $costo
 * @property integer $cantidad
 *
 * @property Acreditacion $acreditacion
 * @property Evento $evento
 * @property Recurso $recurso
 */
class Egreso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'egreso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acreditacion_id', 'recurso_id', 'evento_id'], 'required'],
            [['acreditacion_id', 'recurso_id', 'evento_id', 'cantidad'], 'integer'],
            [['costo'], 'number'],
            [['nombre'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'acreditacion_id' => 'Acreditacion ID',
            'recurso_id' => 'Recurso ID',
            'evento_id' => 'Evento ID',
            'nombre' => 'Nombre',
            'costo' => 'Costo',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcreditacion()
    {
        return $this->hasOne(Acreditacion::className(), ['id' => 'acreditacion_id']);
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
    public function getRecurso()
    {
        return $this->hasOne(Recurso::className(), ['id' => 'recurso_id']);
    }
}

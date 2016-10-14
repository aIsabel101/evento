<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acreditacion".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property integer $user_id
 * @property string $estado
 *
 * @property Evento $inscripcion
 * @property User $user
 * @property Egreso[] $egresos
 */
class Acreditacion extends \yii\db\ActiveRecord
{
    
    const ESTA_ACRE="Si";
    const  NO_ESTA="No";

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acreditacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['inscripcion_id', 'user_id'], 'required'],
           // [['inscripcion_id', 'user_id'], 'integer'],
            [['estado'], 'string', 'max' => 15],
            [['inscripcion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Inscripcion::className(), 'targetAttribute' => ['inscripcion_id' => 'id']],
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
            'inscripcion_id' => 'Inscr',
            'user_id' => 'User ID',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcion()
    {
        return $this->hasOne(Evento::className(), ['id' => 'inscripcion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEgresos()
    {
        return $this->hasMany(Egreso::className(), ['acreditacion_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AcreditacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AcreditacionQuery(get_called_class());
    }
}

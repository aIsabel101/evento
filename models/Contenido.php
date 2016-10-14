<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contenido".
 *
 * @property integer $id
 * @property integer $tema_id
 *
 * @property Tema $tema
 */
class Contenido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contenido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tema_id'], 'required'],
            [['tema_id'], 'integer'],
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
            'tema_id' => 'Tema ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(Tema::className(), ['id' => 'tema_id']);
    }
}

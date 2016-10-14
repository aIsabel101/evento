<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol_user".
 *
 * @property integer $id
 * @property integer $tipousuario_id
 * @property integer $user_id
 *
 * @property Tipousuario $tipousuario
 * @property User $user
 */
class RolUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipousuario_id', 'user_id'], 'required'],
            [['tipousuario_id', 'user_id'], 'integer'],
            [['tipousuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipousuario::className(), 'targetAttribute' => ['tipousuario_id' => 'id']],
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
            'tipousuario_id' => 'Tipo Usuario',
            'user_id' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipousuario()
    {
        return $this->hasOne(Tipousuario::className(), ['id' => 'tipousuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

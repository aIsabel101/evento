<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipousuario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $estadol
 *
 * @property RolUser[] $rolUsers
 */
class Tipousuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipousuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 45],
            [['estadol'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'estadol' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolUsers()
    {
        return $this->hasMany(RolUser::className(), ['tipousuario_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_patrocinador".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $estado
 *
 * @property Patrocinador[] $patrocinadors
 */
class TipoPatrocinador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_patrocinador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
            [['estado'], 'string', 'max' => 10]
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
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatrocinadors()
    {
        return $this->hasMany(Patrocinador::className(), ['tipo_patrocinador_id' => 'id']);
    }
}

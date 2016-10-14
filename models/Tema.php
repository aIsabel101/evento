<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tema".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $area
 * @property string $estado
 * @property integer $id_usuario
 *
 * @property Certificado[] $certificados
 * @property Contenido[] $contenidos
 * @property Material[] $materials
 * @property Recurso[] $recursos
 * @property Sitio[] $sitios
 * @property TemaExpositor[] $temaExpositors
 */
class Tema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['nombre'], 'unique'],
            [['nombre'], 'required'],
           // [['id_usuario'], 'integer'],
            [['nombre', 'area'], 'string', 'max' => 45],
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
            'descripcion' => 'Descripción',
            'area' => 'Area',
            'estado' => 'Estado',
           /* 'id_usuario' => 'Id Usuario',*/
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificados()
    {
        return $this->hasMany(Certificado::className(), ['tema_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContenidos()
    {
        return $this->hasMany(Contenido::className(), ['tema_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['tema_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecursos()
    {
        return $this->hasMany(Recurso::className(), ['tema_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSitios()
    {
        return $this->hasMany(Sitio::className(), ['tema_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemaExpositors()
    {
        return $this->hasMany(TemaExpositor::className(), ['tema_id' => 'id']);
    }
    public static function getDias()
{
        return ['lunes'=>'lunes','martes'=>'martes','miercoles'=>'miercoles', 'jueves'=>'jueves', 'viernes'=>'viernes', 'sabado'=>'sabado', 'domingo'=>'domingo',];
}
     public static function getHorarios()
{
        return $this->hasMany(Horario::className(),['horario_id'=>'id']);
}
}


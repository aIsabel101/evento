<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expositor".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nombre
 * @property string $archivo
 * @property string $estado
 *
 * @property Asistencia[] $asistencias
 * @property EventoExpositor[] $eventoExpositors
 * @property User $user
 * @property Material[] $materials
 * @property Sitio[] $sitios
 * @property TemaExpositor[] $temaExpositors
 */
class Expositor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     
     */
    public $archivo;
    
    public static function tableName()
    {
        return 'expositor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nombre', 'archivo'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 10],
//            ['archivo', 'file',
//                 'skipOnEmpty' => true,
//                // 'uploadRequired' => 'No has seleccionado ningún archivo', //Error
//                 'maxSize' => 1024*1024*1, //1 MB
//                 'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
//                 'minSize' => 10, //10 Bytes
//                 'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
//                 'extensions' => 'pdf, txt, doc',
//                 'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
//                 'maxFiles' => 4,
//                 'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
//    ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          //  'id' => 'ID',
            'user_id' => 'Usuario',
            'nombre' => 'Nombre',
            //'archivo' => 'Archivo',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistencias()
    {
        return $this->hasMany(Asistencia::className(), ['expositor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoExpositors()
    {
        return $this->hasMany(EventoExpositor::className(), ['expositor_id' => 'id']);
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
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['expositor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSitios()
    {
        return $this->hasMany(Sitio::className(), ['expositor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTemaExpositors()
    {
        return $this->hasMany(TemaExpositor::className(), ['expositor_id' => 'id']);
    }
}

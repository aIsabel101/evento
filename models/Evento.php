<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property integer $id
 * @property integer $tipo_evento_id
 * @property string $nombre
 * @property string $tema_principal
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $costo
 * @property string $estado
 * @property string $requisitos
 * @property double $latitud
 * @property double $longitud
 * @property string $nombre_direccion
 * @property string $horas
 * @property integer $cantidad
 *
 * @property Acreditacion[] $acreditacions
 * @property Asistencia[] $asistencias
 * @property Certificado[] $certificados
 * @property Egreso[] $egresos
 * @property Encargado[] $encargados
 * @property TipoEvento $tipoEvento
 * @property EventoExpositor[] $eventoExpositors
 * @property Ingreso[] $ingresos
 * @property Inscripcion[] $inscripcions
 * @property Paquete[] $paquetes
 * @property Patrocinador[] $patrocinadors
 * @property Preinscripcion[] $preinscripcions
 * @property Recurso[] $recursos
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $file;
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_evento_id', 'horas','cantidad', 'horas','nombre', 'logo','tema_principal', 'estado, requisitos', 'nombre_direccion', 'fecha_inicio', 'fecha_fin', 'file'  ], 'required'],//rqueridos
            [['tipo_evento_id', 'costo', 'cantidad'], 'integer'],
          //  [['fecha_inicio', 'fecha_fin'], ''],
            [['latitud', 'longitud', 'horas'], 'number'],
            [['nombre', 'logo','tema_principal', 'estado', 'requisitos', 'nombre_direccion'], 'string', 'max' => 100], //sttring sin rstricciones
            [['nombre','tema_principal'], 'unique'],
          // [['fecha_inicio'], 'compare', 'compareAttribute'=>'fecha_fin', 'operator'=>'<=', 'skipOnEmpty'=>true],
           [['fecha_fin'], 'compare', 'compareAttribute'=>'fecha_inicio', 'operator'=>'>=', 'skipOnEmpty'=>true],
            [['fecha_inicio'], 'compare', 'compareValue'=> date('Y-n-j'), 'operator' => '>='],
            [['file'], 'file'],
            [['tipo_evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEvento::className(), 'targetAttribute' => ['tipo_evento_id' => 'id']],
        ];
    }
//public function compareDateRange($attribute,$params) {
//       echo 'jaaaaaaaaaaaaaa';
//            if(strtotime($this->attributes['fecha_fin']) < strtotime($this->attributes['fecha_inicio'])) {
//                $this->addError($attribute,'The expired date can not be less/before posted date.');
//            }
//        
// 
//    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'tipo_evento_id' => 'Tipo Evento',
            'nombre' => 'Nombre',
            'tema_principal' => 'Tema Principal',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'costo' => 'Costo',
            'estado' => 'Estado',
            'requisitos' => 'Requisitos',
            //'latitud' => 'Latitud',
            //'longitud' => 'Longitud',
            'nombre_direccion' => 'Nombre Dirección',
            'horas' => 'Horas Académicas',
            'cantidad' => 'Cantidad Asistentes',
            'file' => 'Logo',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcreditacions()
    {
        return $this->hasMany(Acreditacion::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistencias()
    {
        return $this->hasMany(Asistencia::className(), ['evento_id1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificados()
    {
        return $this->hasMany(Certificado::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEgresos()
    {
        return $this->hasMany(Egreso::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncargados()
    {
        return $this->hasMany(Encargado::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEvento()
    {
        return $this->hasOne(TipoEvento::className(), ['id' => 'tipo_evento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventoExpositors()
    {
        return $this->hasMany(EventoExpositor::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngresos()
    {
        return $this->hasMany(Ingreso::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatrocinadors()
    {
        return $this->hasMany(Patrocinador::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreinscripcions()
    {
        return $this->hasMany(Preinscripcion::className(), ['evento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecursos()
    {
        return $this->hasMany(Recurso::className(), ['evento_id' => 'id']);
    }
}

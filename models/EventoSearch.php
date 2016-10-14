<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evento;

/**
 * EventoSearch represents the model behind the search form about `app\models\Evento`.
 */
class EventoSearch extends Evento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'costo', 'cantidad'], 'integer'],
            [['nombre', 'tema_principal','tipo_evento_id', 'fecha_inicio', 'fecha_fin', 'estado', 'requisitos', 'nombre_direccion'], 'safe'],
            [['latitud', 'longitud', 'horas'], 'number'],
           [['logo'], 'string', 'max' => 255],
            ['logo','file']
    ];
        
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Evento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('tipoEvento');
                // grid filtering conditions
         //'tipo_evento_id' => $this->tipo_evento_id,
        $query->andFilterWhere([
            'id' => $this->id,
           
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'costo' => $this->costo,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'horas' => $this->horas,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tema_principal', $this->tema_principal])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'requisitos', $this->requisitos])
             ->andFilterWhere(['like', 'tipo_evento.nombre', $this->tipo_evento_id])
            ->andFilterWhere(['like', 'nombre_direccion', $this->nombre_direccion]);

        return $dataProvider;
    }
}

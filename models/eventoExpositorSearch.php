<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\eventoExpositor;

/**
 * eventoExpositorSearch represents the model behind the search form about `app\models\eventoExpositor`.
 */
class eventoExpositorSearch extends eventoExpositor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'evento_id', 'expositor_id'], 'integer'],
            [['fecha_fin', 'fecha_ini', 'hora_inicio', 'hora_fin', 'estado'], 'safe'],
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
        $query = eventoExpositor::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'evento_id' => $this->evento_id,
            'expositor_id' => $this->expositor_id,
            'fecha_fin' => $this->fecha_fin,
            'fecha_ini' => $this->fecha_ini,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}

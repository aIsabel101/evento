<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Recurso;

/**
 * RecursoSearch represents the model behind the search form about `app\models\Recurso`.
 */
class RecursoSearch extends Recurso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'colaborador_id', 'tema_id', 'cantidad'], 'integer'],
            [['nombre','evento_id', 'fecha', 'detalle'], 'safe'],
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
        $query = Recurso::find();

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

        $query->joinWith('evento');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           // 'evento_id' => $this->evento_id,
            'colaborador_id' => $this->colaborador_id,
            'tema_id' => $this->tema_id,
            'cantidad' => $this->cantidad,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
           ->andFilterWhere(['like', 'evento.nombre', $this->evento_id]);
        

        return $dataProvider;
    }
}

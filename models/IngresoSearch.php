<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ingreso;

/**
 * IngresoSearch represents the model behind the search form about `app\models\Ingreso`.
 */
class IngresoSearch extends Ingreso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'evento_id', 'inscripcion_id', 'user_id'], 'integer'],
            [['nombre', 'tipo', 'descripcion', 'costo'], 'safe'],
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
        $query = Ingreso::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'evento_id' => $this->evento_id,
            'inscripcion_id' => $this->inscripcion_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'costo', $this->costo]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Preinscripcion;

/**
 * PreinscripcionSearch represents the model behind the search form about `app\models\Preinscripcion`.
 */
class PreinscripcionSearch extends Preinscripcion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'evento_id', 'monto', 'user_id'], 'integer'],
            [['nombre', 'apellido_paterno', 'apellido_materno', 'fecha'], 'safe'],
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
        $query = Preinscripcion::find();

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
            'monto' => $this->monto,
            'fecha' => $this->fecha,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
            ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno]);

        return $dataProvider;
    }
}

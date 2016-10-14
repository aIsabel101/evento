<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Egreso;

/**
 * EgresoSearch represents the model behind the search form about `app\models\Egreso`.
 */
class EgresoSearch extends Egreso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'acreditacion_id', 'recurso_id', 'evento_id', 'cantidad'], 'integer'],
            [['nombre'], 'safe'],
            [['costo'], 'number'],
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
        $query = Egreso::find();

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
            'acreditacion_id' => $this->acreditacion_id,
            'recurso_id' => $this->recurso_id,
            'evento_id' => $this->evento_id,
            'costo' => $this->costo,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}

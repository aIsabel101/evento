<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Asistencia;

/**
 * AsistenciaSearch represents the model behind the search form about `app\models\Asistencia`.
 */
class AsistenciaSearch extends Asistencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'evento_id1', 'expositor_id', 'user_id', 'participante_id'], 'integer'],
            [['codigoBar', 'fecha', 'estado'], 'safe'],
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
        $query = Asistencia::find();

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
            'evento_id1' => $this->evento_id1,
            'fecha' => $this->fecha,
            'expositor_id' => $this->expositor_id,
            'user_id' => $this->user_id,
            'participante_id' => $this->participante_id,
        ]);

        $query->andFilterWhere(['like', 'codigoBar', $this->codigoBar])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}

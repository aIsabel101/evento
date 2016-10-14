<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paquete;

/**
 * PaqueteSearch represents the model behind the search form about `app\models\Paquete`.
 */
class PaqueteSearch extends Paquete
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'fecha_fin', 'descripcion', 'estado', 'evento_id', 'tipo_paquete_id'], 'safe'],
            [['monto'], 'number'],
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
        $query = Paquete::find();

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
                $query->joinWith('tipoPaquete');


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'monto' => $this->monto,
            'fecha_fin' => $this->fecha_fin,
//            'tipo_paquete.nombre'=> $this->tipo_paquete_id,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'evento.nombre', $this->evento_id])
            ->andFilterWhere(['like', 'tipo_paquete.nombre', $this->tipo_paquete_id]);
            //andFilterWhere(['like', 'nombre', $this->nombre])
          
        return $dataProvider;
    }
}

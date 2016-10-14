<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inscripcion;

/**
 * InscripcionSearch represents the model behind the search form about `app\models\Inscripcion`.
 */
class InscripcionSearch extends Inscripcion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['monto', 'evento_id', 'paquete_id', 'user_id'], 'safe'],
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
        $query = Inscripcion::find();

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
        $query->joinWith('paquete');
        $query->joinWith('user');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
                   ]);

        $query->andFilterWhere(['like', 'monto', $this->monto]);
         $query->andFilterWhere(['like', 'evento.nombre', $this->evento_id]);
          $query->andFilterWhere(['like', 'paquete.nombre', $this->paquete_id]);
           $query->andFilterWhere(['like', 'user.nombre', $this->user_id]);
        
        

        return $dataProvider;
    }
}

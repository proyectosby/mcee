<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GcMomento1;

/**
 * GcMomento1Buscar represents the model behind the search form of `app\models\GcMomento1`.
 */
class GcMomento1Buscar extends GcMomento1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_semana', 'estado'], 'integer'],
            [['descripcion_proposito'], 'safe'],
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
        $query = GcMomento1::find();

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
            'id_semana' => $this->id_semana,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion_proposito', $this->descripcion_proposito]);

        return $dataProvider;
    }
}
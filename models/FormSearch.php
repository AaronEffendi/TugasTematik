<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Form;

/**
 * FormSearch represents the model behind the search form of `app\models\Form`.
 */
class FormSearch extends Form
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FORMID', 'FORMLISTID'], 'number'],
            [['FORMDATESTART', 'FORMDATEEND'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Form::find();

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
            'FORMID' => $this->FORMID,
            'FORMLISTID' => $this->FORMLISTID,
        ]);

        $query->andFilterWhere(['like', 'FORMDATESTART', $this->FORMDATESTART])
            ->andFilterWhere(['like', 'FORMDATEEND', $this->FORMDATEEND]);

        return $dataProvider;
    }
}

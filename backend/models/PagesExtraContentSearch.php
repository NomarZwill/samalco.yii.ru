<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PagesExtraContent;

/**
 * PagesExtraContentSearch represents the model behind the search form of `\common\models\PagesExtraContent`.
 */
class PagesExtraContentSearch extends PagesExtraContent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'page_id'], 'integer'],
            [['menu_image', 'menu_name', 'name_rod', 'common_text_1', 'common_text_2', 'common_text_3', 'common_text_4', 'favorite_alloy'], 'safe'],
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
        $query = PagesExtraContent::find();

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
            'page_id' => $this->page_id,
        ]);

        $query->andFilterWhere(['like', 'menu_image', $this->menu_image])
            ->andFilterWhere(['like', 'menu_name', $this->menu_name])
            ->andFilterWhere(['like', 'name_rod', $this->name_rod])
            ->andFilterWhere(['like', 'common_text_1', $this->common_text_1])
            ->andFilterWhere(['like', 'common_text_2', $this->common_text_2])
            ->andFilterWhere(['like', 'common_text_3', $this->common_text_3])
            ->andFilterWhere(['like', 'common_text_4', $this->common_text_4])
            ->andFilterWhere(['like', 'favorite_alloy', $this->favorite_alloy]);

        return $dataProvider;
    }
}

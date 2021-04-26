<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PagesSubdomenSeo;

/**
 * PagesSubdomenSeoSearch represents the model behind the search form of `\common\models\PagesSubdomenSeo`.
 */
class PagesSubdomenSeoSearch extends PagesSubdomenSeo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'page_id', 'is_slice'], 'integer'],
            [['subdomen_alias', 'page_type', 'header', 'title', 'description', 'keywords', 'text_1', 'text_2', 'text_3', 'text_4'], 'safe'],
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
        $query = PagesSubdomenSeo::find();

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
            'is_slice' => $this->is_slice,
        ]);

        $query->andFilterWhere(['like', 'subdomen_alias', $this->subdomen_alias])
            ->andFilterWhere(['like', 'page_type', $this->page_type])
            ->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'text_1', $this->text_1])
            ->andFilterWhere(['like', 'text_2', $this->text_2])
            ->andFilterWhere(['like', 'text_3', $this->text_3])
            ->andFilterWhere(['like', 'text_4', $this->text_4]);

        return $dataProvider;
    }
}

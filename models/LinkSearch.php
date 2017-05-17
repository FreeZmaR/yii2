<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Link;

/**
 * LinkSearch represents the model behind the search form about `app\models\Link`.
 */
class LinkSearch extends Link
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fk_calendar_id', 'fk_user_id'], 'integer'],
            [['hash', 'description'], 'safe'],
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
        $query = Link::find();

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
            'fk_calendar_id' => $this->fk_calendar_id,
            'fk_user_id' => $this->fk_user_id,
        ]);

        $query->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}

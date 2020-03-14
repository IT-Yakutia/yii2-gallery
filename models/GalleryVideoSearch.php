<?php

namespace uraankhayayaal\gallery\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use uraankhayayaal\gallery\models\GalleryVideo;

/**
 * GalleryVideoSearch represents the model behind the search form of `uraankhayayaal\gallery\models\GalleryVideo`.
 */
class GalleryVideoSearch extends GalleryVideo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'src'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = GalleryVideo::find();

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
            'is_publish' => $this->is_publish,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'src', $this->src]);

        return $dataProvider;
    }
}

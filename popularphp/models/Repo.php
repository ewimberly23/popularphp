<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repo".
 *
 * @property int $id
 * @property int $repo_id
 * @property string $name
 * @property string $url
 * @property string $created_date
 * @property string $last_push_date
 * @property string $description
 * @property int $star_count
 */
class Repo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['repo_id', 'name', 'url', 'created_date', 'last_push_date'], 'required'],
            [['repo_id', 'star_count'], 'integer'],
            [['created_date', 'last_push_date'], 'safe'],
            [['description'], 'string'],
            [['name', 'url'], 'string', 'max' => 255],
            [['repo_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'repo_id' => 'Repo ID',
            'name' => 'Name',
            'url' => 'Url',
            'created_date' => 'Created Date',
            'last_push_date' => 'Last Push Date',
            'description' => 'Description',
            'star_count' => 'Star Count',
        ];
    }

}

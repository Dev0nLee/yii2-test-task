<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "undertopic".
 *
 * @property int $id
 * @property int $topic_id
 * @property string $title
 * @property string $content
 *
 * @property Topic $topic
 */
class Undertopic extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'undertopic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topic_id', 'title', 'content'], 'required'],
            [['topic_id'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
            [['topic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Topic::class, 'targetAttribute' => ['topic_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic_id' => 'Topic ID',
            'title' => 'Подтема',
            'content' => 'Содержание',
        ];
    }

    /**
     * Gets query for [[Topic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::class, ['id' => 'topic_id']);
    }

}

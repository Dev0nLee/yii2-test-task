<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "topic".
 *
 * @property int $id
 * @property string $title
 *
 * @property Undertopic[] $undertopics
 */
class Topic extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Тема',
        ];
    }

    /**
     * Gets query for [[Undertopics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUndertopics()
    {
        return $this->hasMany(Undertopic::class, ['topic_id' => 'id']);
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "source".
 *
 * @property integer $id
 * @property string $caption
 * @property integer $id_author
 *
 * @property Quote[] $quotes
 * @property Author $idAuthor
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_author'], 'integer'],
            [['caption'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caption' => 'Caption',
            'id_author' => 'Id Author',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuotes()
    {
        return $this->hasMany(Quote::className(), ['id_source' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'id_author']);
    }
}

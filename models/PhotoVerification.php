<?php

namespace app\models;

use app\enums\Decision;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "photo_verifications".
 *
 * @property int $id
 * @property int|null $photo_id
 * @property string|null $decision
 */
class PhotoVerification extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo_verifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo_id'], 'default', 'value' => null],
            [['photo_id'], 'integer'],
            [['decision'], 'in', 'range' => [Decision::APPROVED->value, Decision::DECLINED->value]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_id' => 'Photo ID',
            'decision' => 'Decision',
        ];
    }
}

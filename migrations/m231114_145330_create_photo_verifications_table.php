<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%photo_verifications}}`.
 */
class m231114_145330_create_photo_verifications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%photo_verifications}}', [
            'id' => $this->primaryKey(),
            'photo_id' => $this->integer()->unsigned(),
            'decision' => $this->string('20'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%photo_verifications}}');
    }
}

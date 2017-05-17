<?php

use yii\db\Migration;

/**
 * Handles the creation of table `homework`.
 */
class m170517_165654_create_homework_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('homework', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10)->notNull(),
            'address' => $this->string(255)->notNull(),
            'email' => $this->string(50)->notNull()->unique(),
            'phone' => $this->string(10)->notNull()->unique(),
            'date_create' => $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('homework');
    }
}

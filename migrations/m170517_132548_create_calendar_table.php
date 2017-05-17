<?php

use yii\db\Migration;

/**
 * Handles the creation of table `calendar`.
 */
class m170517_132548_create_calendar_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('calendar', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'date' => $this->timestamp()->notNull(),
            'description'=> $this->text(),
            'fk_user_id' => $this->integer(11)->notNull(),
            'create_at' => $this->timestamp(),
            'update_at' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_calendar_user', 'calendar', 'fk_user_id', 'user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_calendar_user', 'calendar');
        $this->dropTable('calendar');
    }
}

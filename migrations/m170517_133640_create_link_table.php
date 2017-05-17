<?php

use yii\db\Migration;

/**
 * Handles the creation of table `link`.
 */
class m170517_133640_create_link_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('link', [
            'id' => $this->primaryKey(),
            'fk_calendar_id' => $this->integer(11)->notNull(),
            'hash' => $this->string(32)->notNull(),
            'fk_user_id' => $this->integer(11),
            'description' => $this->string(255),
        ]);
        $this->addForeignKey('fk_link_user', 'link', 'fk_user_id', 'user', 'id');
        $this->addForeignKey('fk_link_calendar', 'link', 'fk_calendar_id', 'calendar','id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_link_user', 'link');
        $this->dropForeignKey('fk_link_calendar', 'link');
        $this->dropTable('link');
    }
}

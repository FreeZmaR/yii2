<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_memo`.
 */
class m170520_162746_create_user_memo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_memo', [
            'id' => $this->primaryKey(),
            'date_create' => $this->timestamp(),
            'title' => $this->string(100),
            'description' => $this->text()->notNull(),
            'fk_user_id' => $this->integer(11)->notNull(),
        ]);
        $this->addForeignKey('fk_user_memo_user', 'user_memo' ,'fk_user_id' ,'user' ,'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_user_memo_user', 'user_memo');
        $this->dropTable('user_memo');
    }
}

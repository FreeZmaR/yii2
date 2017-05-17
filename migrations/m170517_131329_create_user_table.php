<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170517_131329_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string(15)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'email' => $this->string(45)->notNull()->unique(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}

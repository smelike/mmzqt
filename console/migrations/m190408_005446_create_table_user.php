<?php

use yii\db\Migration;

/**
 * Class m190408_005446_create_table_user
 */
class m190408_005446_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "user";
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		
        $this->createTable($tableName, [
            'user_id' => $this->primaryKey(),
            'login_name' => $this->string()->notNull()->unique(),
            'password' => $this->string(32)->notNull(),
            'token' => $this->string(32)->notNull(),
			'status' => $this->tinyInteger()->notNull()->defaultValue(0),
            'create_time' => $this->integer(),
			'update_time' => $this->integer()
        ], $tableOptions);
		$this->addCommentOnTable($tableName, "用户表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_005446_create_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_005446_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}

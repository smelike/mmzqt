<?php

use yii\db\Migration;

/**
 * Class m190408_023135_create_table_sys_feedback
 */
class m190408_023135_create_table_sys_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "sys_feedback";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'fb_id' => $this->primaryKey(),
			'content' => $this->string(256),
			'user_id' => $this->integer(),
			'contact_method' => $this->string(32),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '用户反馈表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_023135_create_table_sys_feedback cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_023135_create_table_sys_feedback cannot be reverted.\n";

        return false;
    }
    */
}

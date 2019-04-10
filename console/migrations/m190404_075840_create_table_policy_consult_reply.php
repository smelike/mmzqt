<?php

use yii\db\Migration;

/**
 * Class m190404_075840_create_table_policy_consult_reply
 */
class m190404_075840_create_table_policy_consult_reply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "policy_consult_reply";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'policy_consult_reply_id' => $this->primaryKey(),
			'policy_consult_id' => $this->integer(),
			'user_id' => $this->integer(),
			'reply_content' => $this->string(1024),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_075840_create_table_policy_consult_reply cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_075840_create_table_policy_consult_reply cannot be reverted.\n";

        return false;
    }
    */
}

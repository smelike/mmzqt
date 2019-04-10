<?php

use yii\db\Migration;

/**
 * Class m190404_072501_create_table_policy_consult
 */
class m190404_072501_create_table_policy_consult extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "policy_consult";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'policy_consult_id' => $this->primaryKey(),
			'consult_title' => $this->string(24),
			'desc' => $this->string(1024),
			'user_id' => $this->integer(),
			'page_view' => $this->smallInteger(),
			'favor_num' => $this->smallInteger(),
			'status' => $this->tinyInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '政策咨询表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_072501_create_table_policy_consult cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_072501_create_table_policy_consult cannot be reverted.\n";

        return false;
    }
    */
}

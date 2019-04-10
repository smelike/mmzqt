<?php

use yii\db\Migration;

/**
 * Class m190404_070433_create_table_policy_consult
 */
class m190404_070433_create_table_gov_consult extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_consult";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'gov_consult_id' => $this->primaryKey(),
			'type_id' => $this->tinyInteger(),
			'user_id' => $this->integer(),
			'department_id' => $this->integer(),
			'current_location' => $this->string(12),
			'consult_title' => $this->string(24),
			'consult_content' => $this->string(1024),
			'real_name' => $this->string(12),
			'contact_method' => $this->string(24),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '网上问政表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_070433_create_table_policy_consult cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_070433_create_table_policy_consult cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190409_004059_create_table_company
 */
class m190409_004059_create_table_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "company";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'company_id' => $this->primaryKey(),
			'company_name' => $this->string(32),
			'contact_name' => $this->string(12),
			'contact_method' => $this->string(32),
			'create_time' => $this->integer(),
			'update_time' => $this->integer(),
		], $tableOptions);
		
		$this->addCommentOnTable($tableName, "公司表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190409_004059_create_table_company cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190409_004059_create_table_company cannot be reverted.\n";

        return false;
    }
    */
}

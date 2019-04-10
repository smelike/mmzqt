<?php

use yii\db\Migration;

/**
 * Class m190404_025954_create_table_assoc
 */
class m190404_025954_create_table_assoc extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "assoc";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'assoc_id' => $this->primaryKey(),
			'assoc_name' => $this->string(64),
			'assoc_intro' => $this->text(),
			'assoc_contact' => $this->string(32),
			'assoc_addr' => $this->string(32),
			'rules' => $this->text(),
			'type_id' => $this->tinyInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "商协会表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_025954_create_table_assoc cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_025954_create_table_assoc cannot be reverted.\n";

        return false;
    }
    */
}

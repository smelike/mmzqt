<?php

use yii\db\Migration;

/**
 * Class m190404_030224_create_table_assoc_member
 */
class m190404_030224_create_table_assoc_member extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "assoc_member";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'member_id' => $this->primaryKey(),
			'user_id' => $this->integer(),
			'assoc_id' => $this->integer(),
			'status' => $this->tinyInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '商协会会员表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_030224_create_table_assoc_member cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_030224_create_table_assoc_member cannot be reverted.\n";

        return false;
    }
    */
}

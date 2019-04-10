<?php

use yii\db\Migration;

/**
 * Class m190408_015018_create_table_department
 */
class m190408_015018_create_table_department extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "department";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'dep_id' => $this->primaryKey(),
			'dep_name' => $this->integer(),
			'parent_id' => $this->integer()->notNull()->defaultValue(0),
			'charge_man' => $this->string(32),
			'desc' => $this->tinyInteger()->defaultValue(0),
			'contact_method' => $this->string(32),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "政府单位含部门表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_015018_create_table_department cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_015018_create_table_department cannot be reverted.\n";

        return false;
    }
    */
}

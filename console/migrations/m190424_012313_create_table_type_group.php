<?php

use yii\db\Migration;

/**
 * Class m190424_012313_create_table_type_group
 */
class m190424_012313_create_table_type_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "type_group";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable($tableName, [
			'tg_id' => $this->primaryKey(),
			'alias' => $this->string(64),
			'group_name' => $this-> string(128),
			'status' => $this->tinyInteger(2),
		], $tableOptions);
		$this->addCommentOnTable($tableName, "类型分组表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190424_012313_create_table_type_group cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190424_012313_create_table_type_group cannot be reverted.\n";

        return false;
    }
    */
}

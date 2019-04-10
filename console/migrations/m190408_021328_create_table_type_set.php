<?php

use yii\db\Migration;

/**
 * Class m190408_021328_create_table_type_set
 */
class m190408_021328_create_table_type_set extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "type_set";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'type_id' => $this->primaryKey(),
			'name' => $this->string(32),
			'alias' => $this->string(32),
			'status' => $this->tinyInteger()->notNull()->defaultValue(0),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '公共类型集表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_021328_create_table_type_set cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_021328_create_table_type_set cannot be reverted.\n";

        return false;
    }
    */
}

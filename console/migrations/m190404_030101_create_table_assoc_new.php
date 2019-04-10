<?php

use yii\db\Migration;

/**
 * Class m190404_030101_create_table_assoc_new
 */
class m190404_030101_create_table_assoc_new extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = 'assoc_new';
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable($tableName, [
			'new_id' => $this->primaryKey(),
			'new_title' => $this->string(64),
			'new_bd' => $this->text(),
			'type_id' => $this->tinyInteger(),
			'assoc_id' => $this->integer(),
			'page_view' => $this->smallInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "商协会资讯表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_030101_create_table_assoc_new cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_030101_create_table_assoc_new cannot be reverted.\n";

        return false;
    }
    */
}

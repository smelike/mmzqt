<?php

use yii\db\Migration;

/**
 * Class m190408_022242_create_table_sys_page
 */
class m190408_022242_create_table_sys_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "sys_page";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'page_id' => $this->primaryKey(),
			'title' => $this->string(32),
			'content' => $this->text(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, 'APP 单页面表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_022242_create_table_sys_page cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_022242_create_table_sys_page cannot be reverted.\n";

        return false;
    }
    */
}

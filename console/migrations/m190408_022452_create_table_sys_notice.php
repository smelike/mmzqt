<?php

use yii\db\Migration;

/**
 * Class m190408_022452_create_table_sys_notice
 */
class m190408_022452_create_table_sys_notice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "sys_notice";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'notice_id' => $this->primaryKey(),
			'title' => $this->string(64),
			'redirect_url' => $this->string(128),
			'expire_time' => $this->integer(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '系统公告表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_022452_create_table_sys_notice cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_022452_create_table_sys_notice cannot be reverted.\n";

        return false;
    }
    */
}

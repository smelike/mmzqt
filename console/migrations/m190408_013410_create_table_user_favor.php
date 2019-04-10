<?php

use yii\db\Migration;

/**
 * Class m190408_013410_create_table_user_favor
 */
class m190408_013410_create_table_user_favor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "user_favor";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'favor_id' => $this->primaryKey(),
			'user_id' => $this->integer(),
			'item_id' => $this->integer(),
			'type_id' => $this->tinyInteger(),
			'status' => $this->tinyInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '用户收藏表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_013410_create_table_user_favor cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_013410_create_table_user_favor cannot be reverted.\n";

        return false;
    }
    */
}

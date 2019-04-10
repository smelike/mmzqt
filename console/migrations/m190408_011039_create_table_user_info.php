<?php

use yii\db\Migration;

/**
 * Class m190408_011039_create_table_user_info
 */
class m190408_011039_create_table_user_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "user_info";
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		$this->createTable($tableName, [
			'info_id' => $this->primaryKey(),
			'user_id' => $this->integer(),
			'union_type' => $this->tinyInteger(),
			'union_id' => $this->integer(),
			'contact_name' => $this->string(32),
			'contact_mobile' => $this->string(12),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '账户资料表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_011039_create_table_user_info cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_011039_create_table_user_info cannot be reverted.\n";

        return false;
    }
    */
}

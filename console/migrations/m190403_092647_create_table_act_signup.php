<?php

use yii\db\Migration;

/**
 * Class m190403_092647_create_table_act_signup
 */
class m190403_092647_create_table_act_signup extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "act_signup";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		
		$this->createTable($tableName, [
			'signup_id' => $this->primaryKey(),
			'user_id' => $this->integer(),
			'company_id' => $this->integer(),
			'act_id' => $this->integer(),
			'number' => $this->smallInteger(),
			'contact_name' => $this->string(10),
			'contact_method' => $this->string(12),
			'comment' => $this->string(128),
			'create_time' => $this->integer(),
			'update_time' => $this->integer(),
		], $tableOptions);
		$this->addCommentOnTable($tableName, "活动报名表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_092647_create_table_act_signup cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_092647_create_table_act_signup cannot be reverted.\n";

        return false;
    }
    */
}

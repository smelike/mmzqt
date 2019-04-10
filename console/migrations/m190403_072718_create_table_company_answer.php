<?php

use yii\db\Migration;

/**
 * Class m190403_072718_create_table_company_answer
 */
class m190403_072718_create_table_company_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "company_answer";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable($tableName, [
			'id' => $this->primaryKey(),
			'company_id' => $this->integer(),
			'user_id' => $this->integer(),
			'problem_id' => $this->integer(),
			'company_answer' => $this->string(64),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "公司填写答案表");
		$this->addForeignKey('problem_id', 'company_answer', 'problem_id', 'problem', 'problem_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_072718_create_table_company_answer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_072718_create_table_company_answer cannot be reverted.\n";

        return false;
    }
    */
}

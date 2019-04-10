<?php

use yii\db\Migration;

/**
 * Class m190403_064104_create_table_problem
 */
class m190403_064104_create_table_problem extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "problem";
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		$this->createTable($tableName, [
			'problem_id' => $this->primaryKey(),
			'title' => $this->string(128)->notNull(),
			'type_id' => $this->tinyInteger(),
			'content' => $this->string(256)->notNull(),
			'tag' => $this->string(128),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "问卷-题目表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_064104_create_table_problem cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_064104_create_table_problem cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190403_033918_create_table_quest
 */
class m190403_033918_create_table_quest extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "quest";
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		$this->createTable($tableName, [
			'quest_id' => $this->primaryKey(),
			'policy_id' => $this->integer(),
			'problem_id' => $this->integer(),
			'exp' => $this->string(4),
			'pre_answer' => $this->string(56),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		],$tableOptions);
		$this->addCommentOnTable($tableName, "问卷表");
		$this->addForeignKey('policy_id', 'quest', 'policy_id', 'policy', 'policy_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_033918_create_table_quest cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_033918_create_table_quest cannot be reverted.\n";

        return false;
    }
    */
}

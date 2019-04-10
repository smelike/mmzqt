<?php

use yii\db\Migration;

/**
 * Class m190403_061906_add_column_comment_on_quest
 */
class m190403_061906_add_column_comment_on_quest extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "quest";
		
		$this->addCommentOnColumn($tableName, "quest_id", "问卷ID");
		$this->addCommentOnColumn($tableName, "policy_id", "政策ID");
		$this->addCommentOnColumn($tableName, "problem_id", "问卷题目");
		$this->addCommentOnColumn($tableName, "exp", "问题比较表达式");
		$this->addCommentOnColumn($tableName, "pre_answer", "预定义答案");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_061906_add_column_comment_on_quest cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_061906_add_column_comment_on_quest cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190403_065900_add_column_comment_on_problem
 */
class m190403_065900_add_column_comment_on_problem extends Migration
{
    /**
     * {@inheritdoc}
     */
	public function safeUp()
    {
		$tableName = "problem";
		
		$this->addCommentOnColumn($tableName, "problem_id", "问题ID");
		$this->addCommentOnColumn($tableName, "title", "问题标题");
		$this->addCommentOnColumn($tableName, "type_id", "问卷类型-单选、联系方式、邮件、日期、数字-整型/浮点型");
		$this->addCommentOnColumn($tableName, "content", "问题内容");
		$this->addCommentOnColumn($tableName, "tag", "问题标签");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_065900_add_column_comment_on_problem cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_065900_add_column_comment_on_problem cannot be reverted.\n";

        return false;
    }
    */
}

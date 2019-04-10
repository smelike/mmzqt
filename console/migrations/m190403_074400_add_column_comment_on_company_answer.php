<?php

use yii\db\Migration;

/**
 * Class m190403_074400_add_column_comment_on_company_answer
 */
class m190403_074400_add_column_comment_on_company_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "company_answer";
		
		$this->addCommentOnColumn($tableName, "id", "主键ID");
		$this->addCommentOnColumn($tableName, "problem_id", "问题ID");
		$this->addCommentOnColumn($tableName, "company_answer", "公司填写的答案");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_074400_add_column_comment_on_company_answer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_074400_add_column_comment_on_company_answer cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190408_024721_add_column_comment_on_sys_feedback
 */
class m190408_024721_add_column_comment_on_sys_feedback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "sys_feedback";
		$this->addCommentOnColumn($tableName, "fb_id", "主键ID");
		$this->addCommentOnColumn($tableName, "content", "用户反馈内容");
		$this->addCommentOnColumn($tableName, "user_id", "用户ID");
		$this->addCommentOnColumn($tableName, "contact_method", "联系方式");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_024721_add_column_comment_on_sys_feedback cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_024721_add_column_comment_on_sys_feedback cannot be reverted.\n";

        return false;
    }
    */
}

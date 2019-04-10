<?php

use yii\db\Migration;

/**
 * Class m190408_022513_add_column_comment_on_sys_notice
 */
class m190408_022513_add_column_comment_on_sys_notice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "sys_notice";
		$this->addCommentOnColumn($tableName, "notice_id", "主键ID");
		$this->addCommentOnColumn($tableName, "title", "公告标题");
		$this->addCommentOnColumn($tableName, "redirect_url", "跳转链接");
		$this->addCommentOnColumn($tableName, "expire_time", "公告有效期");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_022513_add_column_comment_on_sys_notice cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_022513_add_column_comment_on_sys_notice cannot be reverted.\n";

        return false;
    }
    */
}

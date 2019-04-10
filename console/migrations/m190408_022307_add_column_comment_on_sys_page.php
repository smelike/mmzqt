<?php

use yii\db\Migration;

/**
 * Class m190408_022307_add_column_comment_on_sys_page
 */
class m190408_022307_add_column_comment_on_sys_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "sys_page";
		$this->addCommentOnColumn($tableName, "page_id", "主键ID");
		$this->addCommentOnColumn($tableName, "title", "页面标题");
		$this->addCommentOnColumn($tableName, "content", "页面内容");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_022307_add_column_comment_on_sys_page cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_022307_add_column_comment_on_sys_page cannot be reverted.\n";

        return false;
    }
    */
}

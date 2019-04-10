<?php

use yii\db\Migration;

/**
 * Class m190408_013438_add_column_comment_on_user_favor
 */
class m190408_013438_add_column_comment_on_user_favor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "user_favor";
		$this->addCommentOnColumn($tableName, "favor_id", "主键ID");
		$this->addCommentOnColumn($tableName, "user_id", "用户ID");
		$this->addCommentOnColumn($tableName, "item_id", "关注内容ID，如：政策id/活动id/问答id/咨询id");
		$this->addCommentOnColumn($tableName, "type_id", "内容类型：政策、活动、问答、咨询");
		$this->addCommentOnColumn($tableName, "status", "是否已取消");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_013438_add_column_comment_on_user_favor cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_013438_add_column_comment_on_user_favor cannot be reverted.\n";

        return false;
    }
    */
}

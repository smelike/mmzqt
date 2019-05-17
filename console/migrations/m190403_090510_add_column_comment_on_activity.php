<?php

use yii\db\Migration;

/**
 * Class m190403_090510_add_column_comment_on_activity
 */
class m190403_090510_add_column_comment_on_activity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "activity";
		
		$this->addCommentOnColumn($tableName, 'act_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'type_id', '活动类型ID');
		$this->addCommentOnColumn($tableName, 'thumb', '活动封面图');
		$this->addCommentOnColumn($tableName, 'title', '活动标题');
		$this->addCommentOnColumn($tableName, 'act_start_time', '活动开始时间');
		$this->addCommentOnColumn($tableName, 'act_end_time', '活动结束时间');
		$this->addCommentOnColumn($tableName, 'sign_start_time', '报名开始时间');
		$this->addCommentOnColumn($tableName, 'sign_end_time', '报名截止时间');
		$this->addCommentOnColumn($tableName, 'act_city', '活动区域');
		$this->addCommentOnColumn($tableName, 'act_addr', '活动地址');
		$this->addCommentOnColumn($tableName, 'act_organizer', '活动举办方');
		$this->addCommentOnColumn($tableName, 'act_info', '活动详情');
		$this->addCommentOnColumn($tableName, 'tag', '活动标签');
		$this->addCommentOnColumn($tableName, 'page_view', '浏览次数');
		$this->addCommentOnColumn($tableName, 'favor_num', '收藏量');
		$this->addCommentOnColumn($tableName, 'status', '活动状态');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_090510_add_column_comment_on_activity cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_090510_add_column_comment_on_activity cannot be reverted.\n";

        return false;
    }
    */
}

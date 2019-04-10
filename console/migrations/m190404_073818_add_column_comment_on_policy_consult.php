<?php

use yii\db\Migration;

/**
 * Class m190404_073818_add_column_comment_on_policy_consult
 */
class m190404_073818_add_column_comment_on_policy_consult extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "policy_consult";
		$this->addCommentOnColumn($tableName, 'policy_consult_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'consult_title', '政策咨询标题');
		$this->addCommentOnColumn($tableName, 'desc', '咨询描述');
		$this->addCommentOnColumn($tableName, 'user_id', '咨询用户ID');
		$this->addCommentOnColumn($tableName, 'page_view', '浏览量');
		$this->addCommentOnColumn($tableName, 'favor_num', '收藏数');
		$this->addCommentOnColumn($tableName, 'status', '是否办结');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_073818_add_column_comment_on_policy_consult cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_073818_add_column_comment_on_policy_consult cannot be reverted.\n";

        return false;
    }
    */
}

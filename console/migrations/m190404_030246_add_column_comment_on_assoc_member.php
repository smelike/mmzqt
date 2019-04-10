<?php

use yii\db\Migration;

/**
 * Class m190404_030246_add_column_comment_on_assoc_member
 */
class m190404_030246_add_column_comment_on_assoc_member extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "assoc_member";
		$this->addCommentOnColumn($tableName, 'member_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'user_id', '用户ID');
		$this->addCommentOnColumn($tableName, 'assoc_id', '加入的协会ID');
		$this->addCommentOnColumn($tableName, 'status', '是否加入/退出');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_030246_add_column_comment_on_assoc_member cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_030246_add_column_comment_on_assoc_member cannot be reverted.\n";

        return false;
    }
    */
}

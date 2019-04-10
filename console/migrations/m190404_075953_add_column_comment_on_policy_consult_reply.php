<?php

use yii\db\Migration;

/**
 * Class m190404_075953_add_column_comment_on_policy_consult_reply
 */
class m190404_075953_add_column_comment_on_policy_consult_reply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "policy_consult_reply";
		$this->addCommentOnColumn($tableName, 'policy_consult_reply_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'policy_consult_id', '提问ID');
		$this->addCommentOnColumn($tableName, 'user_id', '回答者ID');
		$this->addCommentOnColumn($tableName, 'reply_content', '回答内容');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_075953_add_column_comment_on_policy_consult_reply cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_075953_add_column_comment_on_policy_consult_reply cannot be reverted.\n";

        return false;
    }
    */
}

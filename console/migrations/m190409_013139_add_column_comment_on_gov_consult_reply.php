<?php

use yii\db\Migration;

/**
 * Class m190409_013139_add_column_comment_on_gov_consult_reply
 */
class m190409_013139_add_column_comment_on_gov_consult_reply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_consult_reply";
		$this->addCommentOnColumn($tableName, 'gov_reply_id', '问政回复主键ID');
		$this->addCommentOnColumn($tableName, 'user_id', '回复用户ID');
		$this->addCommentOnColumn($tableName, 'reply_content', '回复内容');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190409_013139_add_column_comment_on_gov_consult_reply cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190409_013139_add_column_comment_on_gov_consult_reply cannot be reverted.\n";

        return false;
    }
    */
}

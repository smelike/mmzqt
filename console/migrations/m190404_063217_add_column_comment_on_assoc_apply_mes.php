<?php

use yii\db\Migration;

/**
 * Class m190404_063217_add_column_comment_on_assoc_apply_mes
 */
class m190404_063217_add_column_comment_on_assoc_apply_mes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "assoc_apply_mes";
		$this->addCommentOnColumn($tableName, 'mes_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'contact_name', '联系人姓名');
		$this->addCommentOnColumn($tableName, 'contact_mobile', '联系电话');
		$this->addCommentOnColumn($tableName, 'reason', '入会理由');
		$this->addCommentOnColumn($tableName, 'user_id', '用户ID');
		$this->addCommentOnColumn($tableName, 'assoc_id', '加入的协会ID');
		$this->addCommentOnColumn($tableName, 'status', '信息状态');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_063217_add_column_comment_on_assoc_apply_mes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_063217_add_column_comment_on_assoc_apply_mes cannot be reverted.\n";

        return false;
    }
    */
}

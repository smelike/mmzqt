<?php

use yii\db\Migration;

/**
 * Class m190408_011111_add_column_comment_on_user_info
 */
class m190408_011111_add_column_comment_on_user_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "user_info";
		$this->addCommentOnColumn($tableName, 'info_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'user_id', '注册用户ID');
		$this->addCommentOnColumn($tableName, 'union_type', '资料类型：公司、商协、政府单位');
		$this->addCommentOnColumn($tableName, 'union_id', '组织ID');
		$this->addCommentOnColumn($tableName, 'contact_name', '联系人名');
		$this->addCommentOnColumn($tableName, 'contact_mobile', '联系方式');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_011111_add_column_comment_on_user_info cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_011111_add_column_comment_on_user_info cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190408_021348_add_column_comment_on_type_set
 */
class m190408_021348_add_column_comment_on_type_set extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "type_set";
		$this->addCommentOnColumn($tableName, "type_id", "主键ID");
		$this->addCommentOnColumn($tableName, "name", "类型名称");
		$this->addCommentOnColumn($tableName, "alias", "别名，最新服务、政策头条、最新活动etc");
		$this->addCommentOnColumn($tableName, "status", "状态");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_021348_add_column_comment_on_type_set cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_021348_add_column_comment_on_type_set cannot be reverted.\n";

        return false;
    }
    */
}

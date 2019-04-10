<?php

use yii\db\Migration;

/**
 * Class m190408_015056_add_column_comment_on_department
 */
class m190408_015056_add_column_comment_on_department extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "department";
		$this->addCommentOnColumn($tableName, 'dep_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'dep_name', '部门名称');
		$this->addCommentOnColumn($tableName, 'parent_id', '父级ID');
		$this->addCommentOnColumn($tableName, 'charge_man', '部门负责人');
		$this->addCommentOnColumn($tableName, 'desc', '部门简介');
		$this->addCommentOnColumn($tableName, 'contact_method', '联系方式');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_015056_add_column_comment_on_department cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_015056_add_column_comment_on_department cannot be reverted.\n";

        return false;
    }
    */
}

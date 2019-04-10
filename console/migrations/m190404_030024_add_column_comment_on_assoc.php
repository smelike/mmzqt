<?php

use yii\db\Migration;

/**
 * Class m190404_030024_add_column_comment_on_assoc
 */
class m190404_030024_add_column_comment_on_assoc extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "assoc";
		$this->addCommentOnColumn($tableName, 'assoc_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'assoc_name', '协会名称');
		$this->addCommentOnColumn($tableName, 'assoc_intro', '协会简介');
		$this->addCommentOnColumn($tableName, 'assoc_contact', '协会联系方式');
		$this->addCommentOnColumn($tableName, 'assoc_addr', '协会联系地址');
		$this->addCommentOnColumn($tableName, 'rules', '入会须知');
		$this->addCommentOnColumn($tableName, 'type_id', '行业类型');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_030024_add_column_comment_on_assoc cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_030024_add_column_comment_on_assoc cannot be reverted.\n";

        return false;
    }
    */
}

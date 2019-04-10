<?php

use yii\db\Migration;

/**
 * Class m190404_030125_add_column_comment_on_assoc_new
 */
class m190404_030125_add_column_comment_on_assoc_new extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "assoc_new";
		$this->addCommentOnColumn($tableName, 'new_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'new_title', '新闻标题');
		$this->addCommentOnColumn($tableName, 'new_bd', '新闻内容');
		$this->addCommentOnColumn($tableName, 'type_id', '新闻类型');
		$this->addCommentOnColumn($tableName, 'assoc_id', '协会ID');
		$this->addCommentOnColumn($tableName, 'page_view', '浏览量');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_030125_add_column_comment_on_assoc_new cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_030125_add_column_comment_on_assoc_new cannot be reverted.\n";

        return false;
    }
    */
}

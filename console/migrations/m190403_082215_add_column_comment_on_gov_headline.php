<?php

use yii\db\Migration;

/**
 * Class m190403_082215_add_column_comment_on_gov_headline
 */
class m190403_082215_add_column_comment_on_gov_headline extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_headline";
		$this->addCommentOnColumn($tableName, 'top_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'type_id', '服务类型ID');
		$this->addCommentOnColumn($tableName, 'title', '标题');
		$this->addCommentOnColumn($tableName, 'detail', '头条详细内容');
		$this->addCommentOnColumn($tableName, 'favor_num', '收藏数');
		$this->addCommentOnColumn($tableName, 'page_view', '浏览数');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_082215_add_column_comment_on_gov_headline cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_082215_add_column_comment_on_gov_headline cannot be reverted.\n";

        return false;
    }
    */
}

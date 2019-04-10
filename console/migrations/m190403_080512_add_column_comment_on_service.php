<?php

use yii\db\Migration;

/**
 * Class m190403_080512_add_column_comment_on_service
 */
class m190403_080512_add_column_comment_on_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "service";
		$this->addCommentOnColumn($tableName, 'service_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'supplier', '供应商名称');
		$this->addCommentOnColumn($tableName, 'type_id', '服务类型ID');
		$this->addCommentOnColumn($tableName, 'thumb', '缩略图URL');
		$this->addCommentOnColumn($tableName, 'title', '标题');
		$this->addCommentOnColumn($tableName, 'desc', '服务描述');
		$this->addCommentOnColumn($tableName, 'page_view', '浏览量');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_080512_add_column_comment_on_service cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_080512_add_column_comment_on_service cannot be reverted.\n";

        return false;
    }
    */
}

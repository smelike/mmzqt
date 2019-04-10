<?php

use yii\db\Migration;

/**
 * Class m190409_004557_add_column_comment_on_company
 */
class m190409_004557_add_column_comment_on_company extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "company";
		$this->addCommentOnColumn($tableName, 'company_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'company_name', '公司名称');
		$this->addCommentOnColumn($tableName, 'contact_name', '联系人');
		$this->addCommentOnColumn($tableName, 'contact_method', '联系方式');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190409_004557_add_column_comment_on_company cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190409_004557_add_column_comment_on_company cannot be reverted.\n";

        return false;
    }
    */
}

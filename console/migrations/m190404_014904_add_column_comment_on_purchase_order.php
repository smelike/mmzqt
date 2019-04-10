<?php

use yii\db\Migration;

/**
 * Class m190404_014904_add_column_comment_on_purchase_order
 */
class m190404_014904_add_column_comment_on_purchase_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "purchase_order";
		$this->addCommentOnColumn($tableName, "purchase_id", "主键ID");
		$this->addCommentOnColumn($tableName, "purchase_title", "采购标题");
		$this->addCommentOnColumn($tableName, "deadline", "截止日期");
		$this->addCommentOnColumn($tableName, "contact_mobile", "联系电话");
		$this->addCommentOnColumn($tableName, "user_id", "用户ID");
		$this->addCommentOnColumn($tableName, "company_id", "公司组织ID");
		$this->addCommentOnColumn($tableName, "page_view", "浏览量");
		$this->addCommentOnColumn($tableName, "status", "审核状态");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_014904_add_column_comment_on_purchase_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_014904_add_column_comment_on_purchase_order cannot be reverted.\n";

        return false;
    }
    */
}

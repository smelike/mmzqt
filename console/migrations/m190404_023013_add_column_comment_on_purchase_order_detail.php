<?php

use yii\db\Migration;

/**
 * Class m190404_023013_add_column_comment_on_purchase_order_detail
 */
class m190404_023013_add_column_comment_on_purchase_order_detail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "purchase_order_detail";
		$this->addCommentOnColumn($tableName, "good_id", "主键ID");
		$this->addCommentOnColumn($tableName, "purchase_id", "采购订单ID");
		$this->addCommentOnColumn($tableName, "good_name", "商品名称");
		$this->addCommentOnColumn($tableName, "amount", "采购数量");
		$this->addCommentOnColumn($tableName, "unit", "单位");
		$this->addCommentOnColumn($tableName, "ps", "备注");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_023013_add_column_comment_on_purchase_order_detail cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_023013_add_column_comment_on_purchase_order_detail cannot be reverted.\n";

        return false;
    }
    */
}

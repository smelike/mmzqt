<?php

use yii\db\Migration;

/**
 * Class m190404_005145_add_column_comment_on_supply
 */
class m190404_005145_add_column_comment_on_supply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "supply";
		$this->addCommentOnColumn($tableName, "supply_id", "主键ID");
		$this->addCommentOnColumn($tableName, "suply_title", "标题");
		$this->addCommentOnColumn($tableName, "supplier", "供应商名称");
		$this->addCommentOnColumn($tableName, "unit", "物品单位");
		$this->addCommentOnColumn($tableName, "price", "物品单价");
		$this->addCommentOnColumn($tableName, "contact_mobile", "联系电话");
		$this->addCommentOnColumn($tableName, "thumb", "缩略图路径");
		$this->addCommentOnColumn($tableName, "detail", "产品详情");
		$this->addCommentOnColumn($tableName, "page_view", "浏览量");
		$this->addCommentOnColumn($tableName, "status", "是否被审核");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_005145_add_column_comment_on_supply cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_005145_add_column_comment_on_supply cannot be reverted.\n";

        return false;
    }
    */
}

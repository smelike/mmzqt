<?php

use yii\db\Migration;

/**
 * Class m190404_022935_create_table_purchase_order_detail
 */
class m190404_022935_create_table_purchase_order_detail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "purchase_order_detail";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'good_id' => $this->primaryKey(),
			'purchase_id' => $this->integer(),
			'good_name' => $this->string(64)->notNull(),
			'amount' => $this->smallInteger()->notNull(),
			'unit' => $this->string(),
			'ps' => $this->string(256),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "采购订单详情表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_022935_create_table_purchase_order_detail cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_022935_create_table_purchase_order_detail cannot be reverted.\n";

        return false;
    }
    */
}

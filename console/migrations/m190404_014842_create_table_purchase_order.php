<?php

use yii\db\Migration;

/**
 * Class m190404_014842_create_table_purchase_order
 */
class m190404_014842_create_table_purchase_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "purchase_order";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'purchase_id' => $this->primaryKey(),
			'purchase_title' => $this->string(64),
			'deadline' => $this->integer(),
			'contact_mobile' => $this->string(12),
			'user_id' => $this->integer(),
			'company_id' => $this->integer(),
			'page_view' => $this->smallInteger(),
			'status' => $this->tinyInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "采购订单表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_014842_create_table_purchase_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_014842_create_table_purchase_order cannot be reverted.\n";

        return false;
    }
    */
}

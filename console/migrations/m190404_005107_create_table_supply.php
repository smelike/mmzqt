<?php

use yii\db\Migration;

/**
 * Class m190404_005107_create_table_supply
 */
class m190404_005107_create_table_supply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "supply";
		$tableOptions = null;
		if ($this->db->driverName === "mysql") {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'supply_id' => $this->primaryKey(),
			'suply_title' => $this->string(64)->notNull(),
			'supplier' => $this->string(32),
			'unit' => $this->string(2),
			'price' => $this->float(6, 2),
			'contact_mobile' => $this->string(12),
			'thumb' => $this->string(64),
			'detail' => $this->string(256),
			'page_view' => $this->smallInteger(),
			'status' => $this->tinyInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "供求表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_005107_create_table_supply cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_005107_create_table_supply cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190404_063119_create_table_assoc_apply_mes
 */
class m190404_063119_create_table_assoc_apply_mes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "assoc_apply_mes";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'mes_id' => $this->primaryKey(),
			'contact_name' => $this->string(12),
			'contact_mobile' => $this->string(12),
			'reason' => $this->string(256),
			'user_id' => $this->integer(),
			'assoc_id' => $this->integer(),
			'status' => $this->tinyInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '加入协会的申请信息');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_063119_create_table_assoc_apply_mes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_063119_create_table_assoc_apply_mes cannot be reverted.\n";

        return false;
    }
    */
}

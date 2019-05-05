<?php

use yii\db\Migration;

/**
 * Class m190403_081305_create_table_gov_headline
 */
class m190403_081305_create_table_gov_headline extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_headline";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'top_id' => $this->primaryKey(),
			'type_id' => $this->tinyInteger(),
			'title' => $this->string(128),
			'detail' => $this->text(),
			'favor_num' => $this->smallInteger()->defaultValue(0),
			'page_view' => $this->smallInteger()->defaultValue(0),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "政府头条表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_081305_create_table_gov_headline cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_081305_create_table_gov_headline cannot be reverted.\n";

        return false;
    }
    */
}

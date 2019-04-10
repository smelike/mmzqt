<?php

use yii\db\Migration;

/**
 * Class m190403_074847_create_table_service
 */
class m190403_074847_create_table_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "service";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable($tableName, [
			'service_id' => $this->primaryKey(),
			'supplier' => $this->string(32),
			'type_id' => $this->tinyInteger()->defaultValue(0),
			'thumb' => $this->string(128)->notNull(),
			'title' => $this->string(128)->notNull(),
			'desc' => $this->string(512),
			'page_view' => $this->smallInteger(),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, '服务表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_074847_create_table_service cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_074847_create_table_service cannot be reverted.\n";

        return false;
    }
    */
}

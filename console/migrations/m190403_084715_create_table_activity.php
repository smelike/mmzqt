<?php

use yii\db\Migration;

/**
 * Class m190403_084715_activity
 */
class m190403_084715_create_table_activity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "activity";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
		}
		$this->createTable($tableName, [
			'act_id' => $this->primaryKey(),
			'type_id' => $this->tinyInteger(),
			'thumb' => $this->string(128),
			'title' => $this->string(128)->notNull(),
			'act_start_time' => $this->integer(),
			'act_end_time' => $this->integer(),
			'sign_start_time' => $this->integer(),
			'sign_end_time' => $this->integer(),
			'act_city' => $this->string(32),
			'act_addr' => $this->string(64),
			'act_organizer' => $this->string(32),
			'act_info' => $this->text(),
			'tag' => $this->string(128),
			'page_view' => $this->smallInteger()->defaultValue(0),
			'favor_num' => $this->smallInteger()->defaultValue(0),
			'status' => $this->tinyInteger()->defaultValue(0),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		], $tableOptions);
		$this->addCommentOnTable($tableName, "活动表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_084715_activity cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_084715_activity cannot be reverted.\n";

        return false;
    }
    */
}

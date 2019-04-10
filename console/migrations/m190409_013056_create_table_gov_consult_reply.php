<?php

use yii\db\Migration;

/**
 * Class m190409_013056_create_table_gove_consult_reply
 */
class m190409_013056_create_table_gov_consult_reply extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_consult_reply";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable($tableName, [
			'gov_reply_id' => $this->primaryKey(),
			'user_id' => $this->integer(),
			'reply_content' => $this->string(1024),
			'create_time' => $this->integer(),
			'update_time' => $this->integer(),
		], $tableOptions);
		$this->addCommentOnTable($tableName, "网络问政回复表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190409_013056_create_table_gove_consult_reply cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190409_013056_create_table_gove_consult_reply cannot be reverted.\n";

        return false;
    }
    */
}

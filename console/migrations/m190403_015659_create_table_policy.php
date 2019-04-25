<?php

use yii\db\Migration;

/**
 * Class m190403_015659_create_table_policy
 */
class m190403_015659_create_table_policy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "policy";
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		$this->createTable($tableName, [
			'policy_id' => $this->primaryKey(),
			'type_id' => $this->tinyInteger(3),
			'thumb' => $this->string(128),
			'title' => $this->string(128)->notNull()->unique(),
			'open_time' => $this->integer()->notNull(),
			'end_time' => $this->integer()->notNull(),
			'support_way' => $this->tinyInteger(2)->defaultValue(0),
			'charge_depart' => $this->tinyInteger(2)->defaultValue(0),
			'industry' => $this->tinyInteger(2)->defaultValue(0),
			'scale' => $this->smallInteger(6),
			'age' => $this->tinyInteger(4),
			'brief' => $this->string(256),
			'requirement' => $this->text(),
			'support_content' => $this->text(),
			'material' => $this->text(),
			'original_info' => $this->text(),
			'manual' => $this->text(),
			'rank' => $this->tinyInteger(2),
			'status' => $this->tinyInteger(2),
			'is_recommend' => $this->tinyInteger(2)->defaultValue(0),
			'create_time' => $this->integer(),
			'update_time' => $this->integer()
		],$tableOptions);
		$this->addCommentOnTable($tableName, "政策表");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_015659_create_table_policy cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_015659_create_table_policy cannot be reverted.\n";

        return false;
    }
    */
}

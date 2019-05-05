<?php

use yii\db\Migration;

/**
 * Class m190505_003628_add_column_status_on_type_group
 */
class m190505_003628_add_column_status_on_type_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_headline";

		$this->addColumn($tableName, 'status', $this->tinyInteger(2)->defaultValue(0));
		$this->addCommentOnColumn($tableName, 'status', '状态');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m190505_003628_add_column_status_on_type_group cannot be reverted.\n";
		$this->dropColumn('gov_headline', 'status');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190505_003628_add_column_status_on_type_group cannot be reverted.\n";

        return false;
    }
    */
}

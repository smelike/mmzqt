<?php

use yii\db\Migration;

/**
 * Class m190424_012400_add_column_comment_on_type_group
 */
class m190424_012400_add_column_comment_on_type_group extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "type_group";
		$this->addCommentOnColumn($tableName, 'tg_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'alias', '分组英文别名');
		$this->addCommentOnColumn($tableName, 'group_name', '分组中文名');
		$this->addCommentOnColumn($tableName, 'status', '状态');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190424_012400_add_column_comment_on_type_group cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190424_012400_add_column_comment_on_type_group cannot be reverted.\n";

        return false;
    }
    */
}

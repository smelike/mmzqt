<?php

use yii\db\Migration;

/**
 * Class m190404_070530_add_column_comment_on_policy_consult
 */
class m190404_070530_add_column_comment_on_gov_consult extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "gov_consult";
		$this->addCommentOnColumn($tableName, 'gov_consult_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'type_id', '网上问政咨询类型');
		$this->addCommentOnColumn($tableName, 'user_id', '咨询的部门');
		$this->addCommentOnColumn($tableName, 'department_id', '咨询的部门');
		$this->addCommentOnColumn($tableName, 'current_location', '所在城市/地理定位');
		$this->addCommentOnColumn($tableName, 'consult_title', '咨询标题');
		$this->addCommentOnColumn($tableName, 'consult_content', '咨询内容');
		$this->addCommentOnColumn($tableName, 'real_name', '咨询人的真实姓名');
		$this->addCommentOnColumn($tableName, 'contact_method', '咨询人的联系方式');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190404_070530_add_column_comment_on_policy_consult cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190404_070530_add_column_comment_on_policy_consult cannot be reverted.\n";

        return false;
    }
    */
}

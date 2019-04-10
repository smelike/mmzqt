<?php

use yii\db\Migration;

/**
 * Class m190403_093951_add_column_comment_on_act_signup
 */
class m190403_093951_add_column_comment_on_act_signup extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "act_signup";
		
		$this->addCommentOnColumn($tableName, 'signup_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'user_id', '用户账号ID');
		$this->addCommentOnColumn($tableName, 'company_id', '公司ID');
		$this->addCommentOnColumn($tableName, 'act_id', '活动ID');
		$this->addCommentOnColumn($tableName, 'number', '报名人数');
		$this->addCommentOnColumn($tableName, 'contact_name', '联系人姓名');
		$this->addCommentOnColumn($tableName, 'contact_method', '联系方式');
		$this->addCommentOnColumn($tableName, 'comment', '备注');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_093951_add_column_comment_on_act_signup cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_093951_add_column_comment_on_act_signup cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190408_005510_add_column_comment_on_user
 */
class m190408_005510_add_column_comment_on_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "user";
		$this->addCommentOnColumn($tableName, 'user_id', '主键ID');
		$this->addCommentOnColumn($tableName, 'login_name', '登录账户名');
		$this->addCommentOnColumn($tableName, 'password', '登录密码，长度32');
		$this->addCommentOnColumn($tableName, 'token', 'API 交互使用的 token，长度 32');
		$this->addCommentOnColumn($tableName, 'status', '账户状态：是否被禁用等');
		$this->addCommentOnColumn($tableName, 'create_time', '创建时间');
		$this->addCommentOnColumn($tableName, 'update_time', '更新时间');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_005510_add_column_comment_on_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_005510_add_column_comment_on_user cannot be reverted.\n";

        return false;
    }
    */
}

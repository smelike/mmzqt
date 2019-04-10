<?php

use yii\db\Migration;

// 初始化 创建用户表
class m130524_201442_init extends Migration
{
    public function up()
    {
		echo "init: up - time@" . date('Y-m-d H:i:s');
		/*
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		*/
		
		/*
        $this->createTable('{{%user}}', [
            'user_id' => $this->primaryKey(),
            'login_name' => $this->string()->notNull()->unique(),
            'password' => $this->string(32)->notNull(),
            'token' => $this->string()->notNull(),
            'create_time' => $this->dateTime(),
			'update_time' => $this->dateTime(),
            'status' => $this->tinyInteger()->notNull()->defaultValue(0),
            'type_id' => $this->tinyInteger()->notNull()->defaultValue(0)
        ], $tableOptions);
		*/
    }

    public function down()
    {
        //$this->dropTable('{{%user}}');
		echo "init: down";
		return false;
    }
}

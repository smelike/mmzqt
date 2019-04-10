<?php

use yii\db\Migration;

/**
 * Class m190403_034959_add_comment_on_column
 */
class m190403_034959_add_column_comment_on_policy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$tableName = "policy";
		
		$this->addCommentOnColumn($tableName, "policy_id", "政策ID");
		$this->addCommentOnColumn($tableName, "type_id", "政策类型");
		$this->addCommentOnColumn($tableName, "thumb", "缩略图");
		$this->addCommentOnColumn($tableName, "title", "政策标题");
		$this->addCommentOnColumn($tableName, "open_time", "申报开始时间");
		$this->addCommentOnColumn($tableName, "end_time", "申报结束时间");
		$this->addCommentOnColumn($tableName, "support_way", "扶持方式");
		$this->addCommentOnColumn($tableName, "charge_depart", "归口部门");
		$this->addCommentOnColumn($tableName, "industry", "所属行业");
		$this->addCommentOnColumn($tableName, "scale", "规模");
		$this->addCommentOnColumn($tableName, "age", "成立年限");
		$this->addCommentOnColumn($tableName, "brief", "摘要");
		$this->addCommentOnColumn($tableName, "requirement", "申报条件");
		$this->addCommentOnColumn($tableName, "support_content", "扶持内容");
		$this->addCommentOnColumn($tableName, "material", "申报材料");
		$this->addCommentOnColumn($tableName, "original_info", "原文");
		$this->addCommentOnColumn($tableName, "manual", "操作指南");
		$this->addCommentOnColumn($tableName, "rank", "级别");
		$this->addCommentOnColumn($tableName, "status", "状态");
		$this->addCommentOnColumn($tableName, "is_recommend", "是否推荐");
		$this->addCommentOnColumn($tableName, "create_time", "创建时间");
		$this->addCommentOnColumn($tableName, "update_time", "更新时间");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190403_034959_add_comment_on_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190403_034959_add_comment_on_column cannot be reverted.\n";

        return false;
    }
    */
}

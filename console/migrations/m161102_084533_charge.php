<?php

use yii\db\Migration;

class m161102_084533_charge extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%charge}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->smallInteger()->notNull()->defaultValue(0),
            'manager_id' => $this->smallInteger()->notNull()->defaultValue(0),
            'price' => $this->string(45)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'deposit_id' => $this->integer(),
            'milestone_id' => $this->integer(),
            'sub_properties_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%charge}}');
    }
}

<?php

use yii\db\Migration;

class m161102_083247_deposit extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%deposit}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->unique(),
            'price' => $this->string(32)->notNull(),
            'sub_properties_id' => $this->integer()->notNull()->defaultValue(0),
            'status' => $this->string(45)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%deposit}}');
    }
}

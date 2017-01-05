<?php

use yii\db\Migration;

class m161102_084511_milestone extends Migration
{
     public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%milestone}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()->unique(),
            'price' => $this->string(45)->notNull(),
            'properties_id' => $this->smallInteger()->notNull()->defaultValue(6),
            'status' => $this->smallInteger()->notNull(),
            'period' => $this->string(45)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%milestone}}');
    }
}

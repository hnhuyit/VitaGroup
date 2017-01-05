<?php

use yii\db\Migration;

class m161102_083025_user extends Migration
{
     public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull()->defaultValue(0),
            'username' => $this->string(45)->notNull()->unique(),
            'password_hash' => $this->string(45)->notNull(),
            'password_reset_token' => $this->string(45),
            'auth_key' => $this->string(45),
            'email' => $this->string(45)->notNull()->unique(),
            'first_name' => $this->string(45)->notNull(),
            'last_name' => $this->string(45)->notNull(),
            'phone' => $this->string(45)->notNull(),
            'address' => $this->string(45)->notNull(),
            'identity_number' => $this->string(45)->notNull(),
            'tax_code' => $this->string(45)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'language' => $this->string(45)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}

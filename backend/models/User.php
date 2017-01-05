<?php

namespace backend\models;

use Yii;
use  yii\db\Query;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property integer $type
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $passwordNew;
    public $rePasss;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','password_hash', 'email'], 'required'],
            [['type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username','address','phone','identity_number','tax_code', 'password_hash', 'password_reset_token', 'email','first_name','last_name'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['passwordNew','string'],
            ['rePasss','string']
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => \Yii::t('app', 'username'),
            'type' => \Yii::t('app', 'type'),
            'auth_key' => \Yii::t('app', 'authKey'),
            'password_hash' => \Yii::t('app', 'password'),
            'password_reset_token' => \Yii::t('app', 'passwordResetToken'),
            'email' => 'Email',
            'status' => \Yii::t('app', 'status'),
            'created_at' => \Yii::t('app', 'createdAt'),
            'updated_at' => \Yii::t('app', 'updatedAt'),
        ];
    }

    public function findCharge($id){
        // truy vấn đến bản charge;
        $query = new Query();
        $query->select('*')->from('charge')->where(['user_id'=>$id]);
        return $query;
    }


    /*
        function name: userSendmail
        des: send mail to user.
        @property integer $email
    */
    
    public function sendMail($mailForm,$mailTo,$title,$conten){

        Yii::$app->mailer->compose()
        ->setFrom($mailForm)
        ->setTo($mailTo)
        ->setSubject($title)
        >setHtmlBody($conten)
        ->send();

    }
    /*
    function name: UserStatus
        des: change number status to text;
    // @property integer $status, def $status=0;
    */
    public static function UserStatus($status=0){
         if($status==0)
            return \Yii::t('app', 'inActive');
        if($status==1)
            return \Yii::t('app', 'active');
        if($status==2)
            return \Yii::t('app', 'off');
    }
     /*
    function name: userStatusClass
        des: change number status to text;
    // @property integer $status, def $status=0;
    */

    public static function userStatusClass($status=0){
       if($status==0)
            return "label-danger";
        if($status==1)
            return "label-success";
        if($status==2)
            return 'label-warning';  
    }

     /*
    function name: UserType
        des: change number UserType to text;
    // @param integer $type, def $type=0;
    */
    public static function UserType($type=0){
        if($type==0)
            return  \Yii::t('app', 'user');
         if($type==1)
            return  \Yii::t('app', 'manager');
         if($type==2)
            return   \Yii::t('app', 'investor');
         if($type==3)
            return \Yii::t('app', 'admin');
    }

     /*
    function name: resetModel
        des: ;
    // @param array $attr, def $type=0;
    */

    public function resetModel($attr=['password_hash']){
        foreach ($attr as $key){
            $this->offsetUnset($key);
        }
        
    }

   

}

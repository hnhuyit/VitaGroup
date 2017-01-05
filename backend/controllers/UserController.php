<?php

namespace backend\controllers;

use Yii;
// common

use backend\models\User;
use backend\models\UserSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;



/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /*  

        @param string $type;
        @param string $mess;
        @return message string;
    */
        private function setFlash($type,$mess){
            return Yii::$app->session->setFlash($type,$mess);
        }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'delete' => ['POST'],

        ],
        ],
        ];
    }

    // ajax 

    public function actionDeluser(){
        $return_json = ['status' => 'success', 'message' => ' is successfully saved'];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $return_json;
    }


    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $user_view=$this->findModel($id);
        $ustatus  = User::UserStatus($user_view->status);
        $type = User::UserType($user_view->type);
        return $this->render('view', [
            'model' => $user_view,
            'status'=>$ustatus,
            'type'=>$type,

            ]);
    }

    public function actionSingup(){

    }
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   


        $model = new User();
        if ($model->load(Yii::$app->request->post())){
            $model->created_at=time();
            $model->updated_at = time();
           

            if($model->validate()){
                $model->password_hash=Yii::$app->security->generatePasswordHash($model->password_hash);
                $model->auth_key=Yii::$app->security->generateRandomString();
                if($model->save())
                {
                    return $this->redirect(['index']);
                }else{
                   return $this->render('create', [
                    'model' => $model,
                    'typeInput'=>['maxlength' => true]
                    ]);   
               }  
           }else{
            return $this->render('create', [
                'model' => $model,
                'typeInput'=>['maxlength' => true]
                ]);
        }
        
    } else {
        return $this->render('create', [
            'model' => $model,
            'typeInput'=>['maxlength' => true],
            ]);
    }
}

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $passOld = $model->password_hash; 

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->password_hash=$passOld;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    ]);
            }
        }else{
            return $this->render('update', [
                'model' => $model,

                ]);
        }
    }

    /**
     * Updates password user.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionChangepass($id){
        $model = $this->findModel($id);
        $passOld = $model->password_hash;
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                if(Yii::$app->security->validatePassword($model->password_hash, $passOld)){
                    $model->password_hash=Yii::$app->security->generatePasswordHash($model->passwordNew);
                    $model->auth_key=Yii::$app->security->generateRandomString();
                    if($model->save()){
                      $this->setFlash('success','Change password success!');
                      $model->resetModel(['password_hash','passwordNew','rePasss']);
                      return $this->render('changepass', [
                        'model' => $model,
                        ]); 
                  }else{

                    //$model->resetModel(['passwordNew','rePasss']);
                    return $this->render('changepass', [
                        'model' => $model,
                        ]); 
                }
            }else{
                $this->setFlash('error','Incorrect password.');
               //$model->resetModel(['passwordNew','rePasss']);
                return $this->render('changepass', [
                    'model' => $model,
                    ]);    
            }
        }else{
            $model->resetModel(['passwordNew','rePasss']);
            return $this->render('changepass', [
                'model' => $model,
                ]);  
        }

    }else{
        $model->password_hash="";
        return $this->render('changepass', ['model' => $model]); 
    }
}

    /*
      reset password uer
      @param string id;
      @param string new password;
    */

      public function actionRspassword(){
        $model = new User();
        if($model->load(Yii::$app->request->post())){
            $user = User::findOne([
                'email' => $model->email,
                'username'=>$model->username
                ]);
            print_r($model);
            if (!$user){
                $this->setFlash('error','Not result');
                return $this->render('resetpass',['model'=> $model]);
            }else{
                $passrs = Yii::$app->security->generateRandomString();
                $user->password_hash=Yii::$app->security->generatePasswordHash($passrs);
                $user->auth_key=Yii::$app->security->generateRandomString();              
                if($user->save()){
                    $this->setFlash('success','Password user '.$model->username.' reset! '.$passrs);
                    return $this->render('resetpass',['model'=> $model]); 
                }else{
                    $this->setFlash('error','error');
                    return $this->render('resetpass',['model'=> $model]);
                }
            }
        }else{
          return $this->render('resetpass',['model'=> $model]);  
      }

  }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    // del users 
    public function actionDeletes(){
        $id = Yii::$app->request->post();
        
        foreach($id['ids'] as $key => $value) {

            $this->findModel($value)->delete();
        }
        return Json::encode(['mes'=>'Succes','status'=>true]);
    }
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    // user charge
    public function actionCharge(){

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->Charge(Yii::$app->request->queryParams);
        return $this->render('charge', [
           // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);

    }


    // user relative

    public function actionRelative(){

    }



}

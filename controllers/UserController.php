<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TaxDeclaration;
use app\models\TaxDeclarationSearch;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */

    public $generatedPw;

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

    public function generateRandomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        return $randomString;
    }

    /**
     * Lists all Users -> Admin models.
     * @return mixed
     */
    public function actionAdmin()
    {

        $this->layout = 'admin';


        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'admin');
        $dataProvider->pagination->pageSize=5; //not sure

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Users -> Assessor models.
     * @return mixed
     */
    public function actionAssessor()
    {

        $this->layout = 'admin';


        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'assessor');
        $dataProvider->pagination->pageSize=5; //not sure

        return $this->render('assessor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Users -> Treasurer models.
     * @return mixed
     */
    public function actionTreasurer()
    {

        $this->layout = 'admin';


        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'treasurer');
        $dataProvider->pagination->pageSize=5; //not sure

        return $this->render('treasurer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Users -> Taxpayer models.
     * @return mixed
     */
    public function actionTaxpayer()
    {

        $this->layout = 'admin';


        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'taxpayer');
        $dataProvider->pagination->pageSize=5; //not sure

        return $this->render('taxpayer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPassword()
    {

        $this->layout = 'admin';
        $model = new User();
        return $this->render('password', [
                'model' => $model,
            ]);

    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $this->layout = 'admin';
        $model = $this->findModel($id);
        // echo "<br/>" . "<br/>" . "<br/>" . md5('admin') . md5('admin') . " " . $model->password;
        // $hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
        // echo $hash;
        // var_dump($model->generatedPw);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

     public function getFirstLetter($string) {
        return substr($string, 0, 1);
     }


    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $this->layout = 'admin';

        $model = new User();
        // $model->user_type = 'admin';

        if ($model->load(Yii::$app->request->post()) ) {

            $user = TaxDeclaration::find()
                ->where(['property_owner' => $model->last_name])
                ->one();


                
            $model->full_name = trim($model->first_name, " ") . ' ' . trim($model->middle_name, " ") . ' ' . trim($model->last_name, " ");

            $model->authKey = $this->generateRandomString(32);

            
            //generates username
            $temp_lastName = str_replace(" ", "", $model->last_name);
            $user = "";
            $user .= $this->getFirstLetter($model->first_name);
            $user .= $this->getFirstLetter($model->middle_name);
            $user .= $temp_lastName;

            $generatedPw = $this->generateRandomString(6);
            $model->password = md5($generatedPw);

            $user = strtolower($user);
            if ($model->validate()) {
                 $model->username = $user;
            }
             else {
                // validation failed: $errors is an array containing error messages
                $addNum = 1;
                while (!$model->validate()){
                    $model->username = $user . $addNum;
                    $addNum = $addNum + 1;
                }
                // $errors = $model->errors;
                // print_r( $errors);
            }
           

            
        // print_r(Yii::$app->request->post());

        
         if($model->save()){
            Yii::$app->session->setFlash('success', "Username: " . $model->username . "<br/>" . "Password: " . $generatedPw);
            return $this->redirect(['view', 'id' => $model->user_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

       $this->layout = 'admin';

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        $model->full_name = trim($model->first_name, " ") . ' ' . trim($model->middle_name, " ") . ' ' . trim($model->last_name, " ");             
        if($model->save())
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['user/admin']); #not sure
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
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


}

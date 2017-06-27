<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UserController extends Controller
{
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

    public function generateRandomString($length = 32) {
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
    // public function actionTaxpayer()
    // {

    //     $this->layout = 'admin';


    //     $searchModel = new UsersSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 4);
    //     $dataProvider->pagination->pageSize=5; //not sure

    //     return $this->render('taxpayer', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    /*public function actionPassword()
    {

        $this->layout = 'admin';

        $model = new User();
        return $this->render('password', [
                'model' => $model,
            ]);

    }*/

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $this->layout = 'admin';
        
        $model = $this->findModel($id);
        // echo "<br/>" . "<br/>" . "<br/>" ;
        // var_dump($model->username);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
        // echo "<br/>" . "<br/>" . "<br/>" . "HAHAHAHAKDHJSHA";
        if ($model->load(Yii::$app->request->post()) ) {
            $model->full_name = trim($model->first_name, " ") . ' ' . trim($model->middle_name, " ") . ' ' . trim($model->last_name, " ");
            $model->authKey = $this->generateRandomString();


            if($model->save()){
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

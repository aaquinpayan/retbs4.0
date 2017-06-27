<?php

namespace app\controllers;

use Yii;
use app\models\AccountStatement;
use app\models\AccountStatementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TaxDeclaration;
use app\models\TaxDeclarationSearch;

/**
 * AccountStatementController implements the CRUD actions for AccountStatement model.
 */
class AccountStatementController extends Controller
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

    /**
     * Lists all AccountStatement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

        if($user_type == 'admin'){
            $this->layout = 'admin';
        }else if ($user_type === 'assessor'){
            $this->layout = 'assessor';  
        }else if ($user_type === 'treasurer'){
            $this->layout = 'treasurer';  
        }

        $searchModel = new AccountStatementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccountStatement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

        if($user_type == 'admin'){
            $this->layout = 'admin';
        }else if ($user_type === 'assessor'){
            $this->layout = 'assessor';  
        }else if ($user_type === 'treasurer'){
            $this->layout = 'treasurer';  
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AccountStatement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($user)
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

        if($user_type == 'admin'){
            $this->layout = 'admin';
        }else if ($user_type === 'assessor'){
            $this->layout = 'assessor';  
        }else if ($user_type === 'treasurer'){
            $this->layout = 'treasurer';  
        }

        $var = "";

        $model = new AccountStatement();

        if ($model->load(Yii::$app->request->post())) {
            $user = TaxDeclaration::find()
                ->where(['arp_no' => $model->arp_no])
                ->one();

            //$model->total_amount = $user->assessed_value;
           // $model->barangay = $user->location;

            //$var = $user->location;
            //$model->barangay = $var;
            $model->barangay = $user->location;
            $model->property_owner = $user->property_owner;
            $model->address = $user->address;
            $model->year_unpaid = 2016; //edit
            $model->percentage = 24; //edit
            $model->assessed_value = 12; //temp
             if ($model->validate()) {
               

            }else {
                // validation failed: $errors is an array containing error messages
                $errors = $model->errors;
                print_r( $errors);
            }

            $model->basic = $user->assessed_value * 0.01;
            $model->penalty_basic = $model->basic * $model->percentage;
            $model->sef = $user->assessed_value * 0.01;
            $model->penalty_sef = $model->sef * $model->percentage;
            $model->total_amount = $model->basic + $model->penalty_basic + $model->sef + $model->penalty_sef;
            $model->grand_total = $model->total_amount; //edit
            //$model->validity = now();
                    

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->soa_id]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        
    }

    /**
     * Updates an existing AccountStatement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $user_type = trim(Yii::$app->user->identity->user_type, " ");

        if($user_type == 'admin'){
            $this->layout = 'admin';
        }else if ($user_type === 'assessor'){
            $this->layout = 'assessor';  
        }else if ($user_type === 'treasurer'){
            $this->layout = 'treasurer';  
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->soa_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AccountStatement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccountStatement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AccountStatement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccountStatement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}



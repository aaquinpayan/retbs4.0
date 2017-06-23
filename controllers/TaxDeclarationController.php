<?php

namespace app\controllers;

use Yii;
use app\models\TaxDeclaration;
use app\models\TaxDeclarationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * TaxDeclarationController implements the CRUD actions for TaxDeclaration model.
 */
class TaxDeclarationController extends Controller
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
     * Lists all TaxDeclaration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new TaxDeclarationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TaxDeclaration model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TaxDeclaration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaxDeclaration();
        $this->layout = 'admin';

        
        if ($model->load(Yii::$app->request->post())) {
            $model->faas = UploadedFile::getInstance($model, 'faas');
            $model->faas->saveAs('faas_uploads/' . $model->faas->baseName . '.' . $model->faas->extension);
            $model->faas = $model->faas->name;
            // if ($model->validate()) {
                

            // }else {
            //     // validation failed: $errors is an array containing error messages
            //     $errors = $model->errors;
            //     print_r( $errors);
            // }
            // print_r(Yii::$app->request->post());

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->td_no]);
            }    

        } else {
            // echo "<br>" . "<br>" . $imodel->faas;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

     public function actionUpload()
    {
         $this->layout = 'admin';

        $model = new UploadForm();


        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            // $model->faas = UploadedFile::getInstance($model, 'faas');
            
            if ($model->validate()) { 

                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                // $model->faas->saveAs('faas_uploads/' . $model->faas->baseName . '.' . $model->faas->extension);


            }
        }
        
        
         //$this->render('masterlist', array('viewName' => $imodel->viewName));
        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Updates an existing TaxDeclaration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->td_no]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TaxDeclaration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = 'admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TaxDeclaration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaxDeclaration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaxDeclaration::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

   

     public function actionMasterlist($viewName)
    {
        
        // $this->layout = 'admin';
        // $this->load($viewName);
        // echo "<br></br><br></br>" . $viewName;
         return $this->render('masterlist', ['viewName' => $viewName]);
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->td_no]);
        // } else {
            // return $this->render('masterlist',  ['model' => $model,]);
        // }
    }
}

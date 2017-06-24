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
// use NumberToWords\NumberToWords;


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
        $model = $this->findModel($id);
        

        // if ($model->validate()) {
                

            // }else {
            //     // validation failed: $errors is an array containing error messages
            //     $errors = $model->errors;
            //     print_r( $errors);
            // }
        if($model->taxability == 1) $model->taxability = "Taxable";
            else $model->taxability = "Exempt";


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
            $model->taxdec = UploadedFile::getInstance($model, 'taxdec');

            $model->faas->saveAs('faas_uploads/' . $model->faas->baseName . '.' . $model->faas->extension);
            $model->taxdec->saveAs('taxdec_uploads/' . $model->taxdec->baseName . '.' . $model->taxdec->extension);

            $model->faas = $model->faas->name;
            $model->taxdec = $model->taxdec->name;

            // create the number to words "manager" class
            $numberToWords = new NumberToWords();

            // build a new number transformer using the RFC 3066 language identifier
            $currencyTransformer = $numberToWords->getCurrencyTransformer('en');

            $model->tot_assessed_value = $currencyTransformer->toWords(($model->php)*100, 'PESO');


            // if($model->property_kind == 'a') $model->property_kind = "Land";
            // else if($model->property_kind == 'b') $model->property_kind = "Building";
            // else if($model->property_kind == 'c') $model->property_kind = "Machinery";
            // else $model->property_kind = "Others";

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

        $model->php= str_replace(",","",$model->php);
        $model->php=str_replace("$","",$model->php);
        $model->assessed_value= str_replace(",","",$model->assessed_value);
        $model->assessed_value=str_replace("$","",$model->assessed_value);
        $model->total_php= str_replace(",","",$model->total_php);
        $model->total_php=str_replace("$","",$model->total_php);
        $model->market_value= str_replace(",","",$model->market_value);
        $model->market_value=str_replace("$","",$model->market_value);

        switch($model->property_kind){
            case 'Land' : $model->property_kind = "Land";
            case 'Building' : $model->property_kind = "Building";
            case 'Machinery' : $model->property_kind = "Machinery";
            case 'Others' : $model->property_kind = "Others";
        }
        
        // if($model->property_kind == 'Land') $model->property_kind = "Land";
        // else if($model->property_kind == 'Building') $model->property_kind = "Building";
        // else if($model->property_kind == 'Machinery') $model->property_kind = "Machinery";
        // else if($model->property_kind == 'Others') $model->property_kind = "Others";
        // echo "<br/>" . "<br/>" . "<br/>" . $model->property_kind;

        if($model->taxability == 'Taxable') $model->taxability = 'Taxable';
        else $model->taxability = 'Exempt';

        
        $originalFaas = $model->faas;
        $originalTaxdec = $model->taxdec;

        if ($model->load(Yii::$app->request->post())) {

            $uploadedFaas =  UploadedFile::getInstance($model, 'faas');
            $uploadedTaxdec = UploadedFile::getInstance($model, 'taxdec');

            $model->attributes = Yii::$app->request->post();
            
            if (isset($uploadedFaas) && isset($uploadedTaxdec)){
                $model->faas = $uploadedFaas;
                $model->taxdec = $uploadedTaxdec;

                $model->faas->saveAs('faas_uploads/' . $model->faas->baseName . '.' . $model->faas->extension);
                $model->taxdec->saveAs('taxdec_uploads/' . $model->taxdec->baseName . '.' . $model->taxdec->extension);

                $model->faas = $uploadedFaas->name;
                $model->taxdec = $uploadedTaxdec->name;
            }else if(isset($uploadedFaas) && !isset($uploadedTaxdec)){
                $model->faas = $uploadedFaas;
                $model->taxdec = $originalTaxdec;

                $model->faas->saveAs('faas_uploads/' . $model->faas->baseName . '.' . $model->faas->extension);
                $model->faas = $uploadedFaas->name;
            }else if(!isset($uploadedFaas) && isset($uploadedTaxdec)){
                $model->taxdec = $uploadedTaxdec;
                $model->faas = $originalFaas;

                $model->taxdec->saveAs('taxdec_uploads/' . $model->taxdec->baseName . '.' . $model->taxdec->extension);
                $model->taxdec = $uploadedTaxdec->name;
            }else{
                $model->faas = $originalFaas;
                $model->taxdec = $originalTaxdec;
            }
            
            // $model->faas = $model->faas->name;
            // $model->taxdec = $model->taxdec->name;
           

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->td_no]);
            }
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

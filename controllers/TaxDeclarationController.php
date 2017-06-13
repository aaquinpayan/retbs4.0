<?php

namespace app\controllers;

use Yii;
use app\models\TaxDeclaration;
use app\models\TaxDeclarationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



/**
 * TaxDeclarationController implements the CRUD actions for TaxDeclaration model.
 */
class TaxDeclarationController extends Controller
{
    /**
     * @inheritdoc
     */
    public $file;

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

   

    public function actionCreate(){
        $this->layout = 'admin';

        $model = new TaxDeclaration();

        if ($model->load(Yii::$app->request->post())){

            //$model->cancels_arp_no = $cancel_arp_no;
            //$model->cancels_assessed_value = $cancel_assessed_value; 
            $model->assessed_value = $model->market_value * $model->assessment_level;
            $model->php = $model->assessed_value;
            $model->total_php = $model->market_value;
            $model->tot_assessed_value = Yii::$app->formatter->asSpellout($model->assessed_value) . ' pesos';

            //$taxdec_pdf = UploadedFile::getInstance($model, 'taxdec_pdf');

            //$model->tax_dec_filename = $taxdec_pdf->name;
            //$ext = end((explode(".", $taxdec_pdf->name)));

            //$model->tax_dec_pdf = Yii::$app->security->generateRandomString().".{$ext}";

            //$path = Yii::$app->params['uploadPath'] . $model->tax_dec_pdf;

            if($model->save()) {
                //$taxdec_pdf->saveAs($path);
                return $this->redirect(['view', 'id' => $model->td_no]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

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

        if ($model->load(Yii::$app->request->post())){

            //$model->cancels_arp_no = $cancel_arp_no;
            //$model->cancels_assessed_value = $cancel_assessed_value; 
            $model->assessed_value = $model->market_value * $model->assessment_level;
            $model->php = $model->assessed_value;
            $model->total_php = $model->market_value;
            $model->tot_assessed_value = Yii::$app->formatter->asSpellout($model->assessed_value) . ' pesos';

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->td_no]);
            }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->td_no]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
            }
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
 
    public function actionReport($id) {


        $model = $this->findModel($id);

        $pdf = Yii::$app->pdf;
        $pdf->content = $this->renderPartial('_taxdecDownload', ['model' => $this->findModel($id)]);

        //$pdf->content = $this->renderPartial('_taxdecDownload');

        return $pdf->render();
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

    public function actionUpload()
    {
         $this->layout = 'admin';

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            

            if ($model->validate()) { 

                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);


            }
        }
        
        return $this->render('upload', ['model' => $model]);
    }

    public function actionDownload($id) 
{ 
    $download = UploadedFile::findOne($id); 
    $path=Yii::getAlias('@webroot').'/uploads/'.$download->attachment;

    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path);
    }
}
public function actionPdf($id) {
    $model = ModelClass::findOne($id);

    // This will need to be the path relative to the root of your app.
    $filePath = 'uploads/';
    // Might need to change '@app' for another alias
    $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->fileName);

    return Yii::$app->response->sendFile($completePath, $model->fileName);
}


}

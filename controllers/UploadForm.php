<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
*/
class UploadForm extends Model
{
/**
 * @var UploadedFile|Null file attribute
 */
public $file;
// public $faas;
public $id;
/**
 * @return array the validation rules.
 */
public function rules()
{
    return [
        [['file'], 'file', 'extensions'=>'xlsx, xls'],
        // [['faas'], 'faas', 'extensions' => 'jpg,png'], 

    ];
}
public function actionDownload($id) 
{ 
    $download = UploadedFile::findOne($id); 
    $path=Yii::getAlias('@webroot').'/uploads/'.$download->file;

    if (file_exists($path)) {
        return Yii::$app->response->sendFile($path);
    }
}

public function actionPdf($id) {
    $model = ModelClass::findOne($id);

    // This will need to be the path relative to the root of your app.
    $filePath = '/uploads/';
    // Might need to change '@app' for another alias
    $completePath = Yii::getAlias('@app'.$filePath.'/'.$model->fileName);

    return Yii::$app->response->sendFile($completePath, $model->fileName);
}

// public function validate(){
// 	$fileupload = UploadedFile::getInstance($model, 'file'); 
// 	if(!empty($fileupload)) { $fileupload->saveAs('uploads/' . $fileupload->baseName . '.' . $fileupload->extension); $model->file = $fileupload->baseName . '.' . $fileupload->extension; $model->save(); }	Yii::$app->getSession()->setFlash('succ', 'Category added successfully'); return Yii::$app->getResponse()->redirect('/tax-declaration/index');
// }
}
?>
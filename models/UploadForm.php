<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\validators\FileValidator;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;
     // public $faas;
    // public $viewName;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx,xls'], 
            // [['faas'], 'faas', 'skipOnEmpty' => false, 'extensions' => 'jpg,png'], 
             
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            $this->faas->saveAs('faas_uploads/' . $this->faas->baseName . '.' . $this->faas->extension);

             Yii::$app->getSession()->setFlash('success', [
            'type' => 'success',
            'icon' => 'fa fa-users',
            'message' => Yii::t(Html::encode('My Message')),
            'title' => Yii::t('app', Html::encode('My Title')),
        ]);
            return true;
        } else {
            return false;
        }
    }
}

?>
<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\validators\FileValidator;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $pdfFile;

    public function rules()
    {
        return [
            [['pdfFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->pdfFile->saveAs('uploads/' . $this->pdfFile->baseName . '.' . $this->pdfFile->extension);
            return true;
        } else {
            return false;
        }
    }
}

?>
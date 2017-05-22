<<<<<<< HEAD
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

=======
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

/**
 * @return array the validation rules.
 */
public function rules()
{
    return [
        [['file'], 'file'],
    ];
}
}
>>>>>>> origin/db_branch
?>
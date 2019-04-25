<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
			$fileName = time()  . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('../../uploads/' . $fileName);
            return $fileName;
        } else {
            return false;
        }
    }
}
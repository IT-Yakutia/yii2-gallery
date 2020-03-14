<?php

namespace uraankhayayaal\gallery\widgets\imgUploader\forms;

use Yii;
use yii\imagine\Image;

class GalleryPhoto extends \yii\base\Model
{
    public $files;
    public $subject_name;
    public $subject_id;
    public $subject_attribute;

    public function rules()
    {
        return [
            [['subject_id', 'files'], 'required'],
            [['files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10],
            [['subject_id'], 'integer'],
            [['subject_name'], 'string'],
        ];
    }

    public function upload()
    {
    	//$files = UploadedFile::getInstances($this, 'files');
        if ($this->validate()) {
        	//$imageFiles = UploadedFile::getInstances($this, 'files');
            foreach ($this->files as $file) {
       			// 'ImgUrl' => 'http://kindergarten.ru/uploads',
    			// 'ImgPath' => '@frontend/web/uploads',
                $path_original = \Yii::getAlias('@frontend/web/images/uploads/gallery/'.$this->subject_name.'/'.$this->subject_id.'/original/');
    			$path_original = rtrim($path_original, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    			$path = \Yii::getAlias('@frontend/web/images/uploads/gallery/'.$this->subject_name.'/'.$this->subject_id.'/');
    			// \yii\helpers\FileHelper::createDirectory($path_original, $mode = 0775, $recursive = true);
                if (!file_exists($path_original) || !is_dir($path_original))
                    \yii\helpers\FileHelper::createDirectory($path_original, $mode = 0775, $recursive = true);
                if($file->saveAs($path_original . $file->baseName . '.' . $file->extension))
                {//uniqid()
                    list($width, $height, $type, $attr) = getimagesize($path_original . $file->baseName . '.' . $file->extension);
                	if(Image::thumbnail($path_original . $file->baseName . '.' . $file->extension, 20*$width/$height, 20)
    				->save($path. $file->baseName . '.' . $file->extension, ['quality' => 10])){
                		$photo = new \common\modules\gallery\models\GalleryPhoto();
                        $photo->name = $file->baseName;
	                	//$photo->subject_id = $this->subject_id;
                        $photo->src = '/images/uploads/gallery/'.$this->subject_name.'/'.$this->subject_id.'/'. $file->baseName . '.' . $file->extension;
	                	$photo->original = '/images/uploads/gallery/'.$this->subject_name.'/'.$this->subject_id.'/original/'. $file->baseName . '.' . $file->extension;
                        $photo->w = intval($width);
                        $photo->h = intval($height);
	                	if($photo->save()){
                            $className = "\common\modules\gallery\models\\".$this->subject_name;
                            $attributeName = $this->subject_attribute;
                            $gallery = new $className();
	                		$gallery->$attributeName = $this->subject_id;
                            $gallery->photo_id = $photo->id;
                            $gallery->save();
	                	}else{
        					var_dump($photo->errors);die;
	                	}
    				}else{
        				var_dump(Image::thumbnail($path . $file->baseName . '.' . $file->extension, 520, 520)
    						->save(\Yii::getAlias('@frontend/web/images/uploads/gallery/'.$this->subject_name.'/'.$this->subject_id.'/') . $file->baseName . '.' . $file->extension, ['quality' => 70]));die;
    				}
                	
                }else{
        			var_dump($file->saveAs($path_original . $file->baseName . '.' . $file->extension));die;
                }
            }
            return true;
        } else {
        	var_dump($this->errors);die;
            return false;
        }
    }
}

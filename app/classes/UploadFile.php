<?php


namespace App\Classes;


class UploadFile
{
    protected $filename;
    protected $max_filesize = 2097152;
    protected $extension;
    protected $path;

    /**
     * Get the file name
     * @return mixed
     */
    public function getName()
    {
        return $this->filename;
    }

    /**
     * Set Name of the file
     * @param $file
     * @param string $name
     */

    protected function setName($file, $name = "")
    {
        if ($name === "") {
            $name = pathinfo($file, PATHINFO_FILENAME);
        }

        $name = strtolower(str_replace(['_', ' '], '-', $name));
        $hash = md5(microtime());
        $ext = $this->fileExtension();

        $this->filename = "{$name}-{$hash}.{$ext}";
    }

    /**
     * Set file extension
     * @param $file
     * @return string|string[]
     */

    protected function fileExtension($file)
    {
        return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
    }

    /**
     * Validate file size
     * @param $file
     * @return bool
     */

    public static function fileSize($file)
    {
        $fileObj = new static();
        return $file > $fileObj->max_filesize ? true : false;
    }

    /**
     * Validate file upload
     * @param $file
     * @return bool
     */

    public static function isImage($file)
    {
        $fileObj = new static();
        $ext = $fileObj->fileExtension($file);
        $validExt = array('jpg', 'jpeg', 'png', 'bmp', 'gif');

        if (!in_array(strtolower($ext), $validExt)) {
            return false;
        }

        return true;
    }

    /**
     * Get the path where file was uploaded
     * @return mixed
     */

    public function path()
    {
        return $this->path;
    }

}
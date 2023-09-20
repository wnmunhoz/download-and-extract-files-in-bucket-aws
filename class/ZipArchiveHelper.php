<?php
class ZipArchiveHelper {
    private $zip;

    public function __construct()
    {
        $this->zip = new ZipArchive();
    }

    public function ExtractFile($path, $file) {
        try {        
            if ($this->zip->open('./tmp/'.$file) === true) {
                $this->zip->extractTo('./tmp/'.$path.'/');
                $this->zip->close();
                
                return true;
            } else {
                throw new Exception('Not is possible extract file.');
            }
        }
        catch (Exception $ex) {
            throw $ex;
        }
    }
}
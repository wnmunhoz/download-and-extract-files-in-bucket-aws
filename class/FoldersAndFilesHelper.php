<?php
class FoldersAndFilesHelper {
    private $path;

    public function __construct($path)
    {
        $this->path = $path;

        $this->CreateFolders();
    }

    private function CreateFolders() {
        try {
            if(!file_exists('tmp/')) {
                mkdir('tmp/');
            }

            if(!file_exists('tmp/'.$this->path)) {
                mkdir('tmp/'.$this->path);
            }
        }
        catch(Exception){            
            throw new Exception("Not is possible creating folder. Verify permition for writing in folder: " . './tmp/'.$this->path);
        }
    }

    public function SaveFile($file, $content) {
        try {                        
            file_put_contents('./tmp/'.$file, $content);
        }
        catch(Exception){            
            throw new Exception("Not is possible saving file. Check if the tmp folder was created or if there is permission to saving to the folder.");
        }
    }    

    public function DeleteFile($file) {
        try {
            if(file_exists('./tmp/'.$file) && !is_dir('./tmp/'.$file)) {
                unlink('./tmp/'.$file);
            }
        }
        catch (Exception)
        {
            throw new Exception("Error deleting temporary file. Check whether there is write permission on the folder.");
        }
    }
}
<?php
use Aws\S3\S3Client;

class S3ClientHelper {
    private $s3;
    
    public function __construct($region, $key, $secret)
    {
        $this->s3 = new S3Client([
            'region'      => $region,
            'credentials' => [
                'key'     => $key,
                'secret'  => $secret,
            ],				
        ]);
    }
        
    public function DownloadFile($bucket, $path, $file)
    {
        try {
            $result = $this->s3->getObject([
                'Bucket'    => $bucket,
                'Key'       => $file            
            ]);

            $content = $result['Body'];

            $foldersAndFiles = new FoldersAndFilesHelper($path);
            $foldersAndFiles->SaveFile($file, $content);            

            $zip = new ZipArchiveHelper();
            
            if ($zip->ExtractFile($path, $file)) {
                $foldersAndFiles->DeleteFile($file);

                echo 'File extracted successfully.';
            }
        }
        catch (Exception $ex) {
            throw $ex;
        }
    }
}
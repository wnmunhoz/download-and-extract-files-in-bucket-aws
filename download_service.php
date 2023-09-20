<?php
require 'vendor/autoload.php';
require 'class/FoldersAndFilesHelper.php';
require 'class/ZipArchiveHelper.php';
require 'class/S3ClientHelper.php';

//variables to contructor
$region = '';
$key = '';
$secret = '';

//variables to download
$bucket = '';
$path = '';
$file = '';

//To replace the blank variables above.
//Through the config.php file that is not committed
include_once 'config.php';

try {    
    $s3ClientHelper = new S3ClientHelper($region, $key, $secret);    
    $s3ClientHelper->DownloadFile($bucket, $path, $file);
}
catch (Aws\S3\Exception\S3Exception $ex)
{
    print '<pre>';
    echo $ex->getMessage();
}
catch (Exception $ex)
{
    print '<pre>';
    echo $ex;
}
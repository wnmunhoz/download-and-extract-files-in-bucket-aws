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

try {    
    $s3ClientHelper = new S3ClientHelper($region, $region, $secret);    
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
<?php

declare(strict_types = 1);

namespace App\Helpers;

use App\Exception\NotFountException;

class Config
{


    public static function get(string $filename, string $key = null):array|string
    {
        $fileContent = self::getFileContent($filename);
        if($key === null) {
            return $fileContent;
        }
        return isset($fileContent[$key]) ? $fileContent[$key] : [];
    }

    public static function getFileContent(string $filename):array
    {
        $fileContent = [];
        try {
            $path = realpath(sprintf(__DIR__.'/../Config/%s.php',$filename));
            if(file_exists($path)){
                $fileContent = require $path;
            }
        } catch (\Throwable $e) {
            throw new NotFountException( sprintf('The specified file: %s was not found', $filename));
            
        }
        return $fileContent;
    }


}
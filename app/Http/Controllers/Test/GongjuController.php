<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GongjuController extends Controller
{
    /**
     * 九九乘法表
     */
    public function jiuJiu()
    {
        for ($i = 9; $i >= 1; $i--) {
            for ($j = $i; $j >= 1; $j--) {
                echo "$j * $i=" . $j * $i . "&nbsp;&nbsp;";
            }
            echo "<br>";
        }
    }
    
    //public function readDir(){
    //    if ($handle = opendir('../')) {
    //        while (false !== ($file = readdir($handle))) {
    //            if ($file != "." && $file != "..") {
    //                echo "$file\n";
    //            }
    //        }
    //        closedir($handle);
    //    }
    //}
    
    function readDir($dir='../')
    {
        $files = [];
        if (!is_dir($dir)) {
            return $files;
        }
        $handle = opendir($dir);
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                if ($file != '.' && $file != '..') {
                    $filename = $dir . "/" . $file;
                    if (is_file($filename)) {
                        $files[] = $filename;
                    }
                    else {
                        $tmp=$this->readDir($filename);
                        $files = array_merge($files, $tmp);
                    }
                }
            } // end while
            closedir($handle);
        }
        
        return $files;
    } // end function
}

<?php

namespace App\Http\Controllers\Test;

use App\Jobs\Job;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Psy\CodeCleaner\LegacyEmptyPass;

class SuanfaController extends Controller
{
    public function __construct()
    {
        
    }
    
    /**
     * 冒泡排序
     *
     * @return array|bool
     */
    function bubbleSort()
    {
        var_dump(phpinfo());die;
        $arr = [1, 43, 54, 62, 39, 21, 66, 32, 78, 36, 76, 39];
        $len = count($arr);
        if ($len <= 0) {
            return false;
        }
        for ($i = 1; $i < $len; $i++) {
            for ($k = 0; $k < $len - $i; $k++) {
                if ($arr[$k] > $arr[$k + 1]) {
                    $tmp         = $arr[$k + 1];
                    $arr[$k + 1] = $arr[$k];
                    $arr[$k]     = $tmp;
                }
            }
        }
        
        $first[] = $arr[0];
        $floow   = [];
        for ($i = 0; $i < $len; $i++) {
            if ($arr[$i] != $arr[$i - 1]) {
                $floow[] = $arr[$i];
            }
        }
        $array = array_merge($first, $floow);
        
        return $array;
    }
    
    /**
     * 查询ip的方法
     * 网站多种查询的API地址：http://blog.csdn.net/cnyygj/article/details/51868182
     */
    function get_ip()
    {
        $ip   = file_get_contents("http://pv.sohu.com/cityjson?ie=utf-8");
        $ip   = mb_substr($ip, 19);
        $len  = strlen($ip);
        $ip   = mb_substr($ip, 0, $len - 7);
        $ip   = json_decode($ip);
        $data = [
            'IP'   => $ip->cip,
            '城市ID' => $ip->cid,
            '城市名称' => $ip->cname,
        ];
        dd($data);
    }
    
    /**
     * 选择排序
     * 首先假设第一个数为最小值，则把第一个数和后面所有的数进行比较，直到有个数比他大为止，则和这个数调换位置，最终实现选择排序，从小到大排序
     *
     * @return array|bool
     */
    function selectSort()
    {
        $arr = [1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39];
        $len = count($arr);
        if ($len <= 0) {
            return false;
        }
        //双重循环，外层控制轮数，内层控制比较次数
        for ($i = 0; $i < $len - 1; $i++) {
            //假设最小值为第一个数
            $p = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                //表示$arr[$p]是之前假设的最小值
                if ($arr[$p] > $arr[$j]) {
                    //在比较中发现有个值比我们假设的最小值还要小，则记录下最小值的位置，在下次比较的时候用这个值开始比较
                    $p = $j;
                }
            }
            //确认最小值不是我们假设的最小值，则和我们假设的最小值进行互换
            if ($p != $i) {
                $tmp     = $arr[$p];
                $arr[$p] = $arr[$i];
                $arr[$i] = $tmp;
            }
        }
        //输出第一个数
        $first[] = $arr[0];
        $floow   = [];
        for ($i = 0; $i < $len; $i++) {
            //判断这个数和前面的数是否相同，若是不相同则输出
            if ($arr[$i] != $arr[$i - 1]) {
                $floow[] = $arr[$i];
            }
        }
        $array = array_merge($first, $floow);
        
        return $array;
    }
    
    /**
     * 插入排序
     * 假设前面的数都是已经排序好的数，现在需要从第n个开始排序，要把第n个数字插入到前面的有序数中，使得这n个数也是排好顺序的，如此反复循环，直到所有的都排好序
     *
     * @return array|bool
     */
    function insertSort()
    {
        $arr = [1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39];
        $len = count($arr);
        if ($len <= 0) {
            return false;
        }
        //双重循环，外层控制轮数，内层控制比较次数
        for ($i = 1; $i < $len; $i++) {
            //假设要插入的数为第n个数
            $tmp = $arr[$i];
            //内层循环，比较并插入
            for ($j = $i - 1; $j >= 0; $j--) {
                //发现插入的元素要小，交换位置，将后边的元素和前面的元素进行互换位置
                if ($tmp < $arr[$j]) {
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j]     = $tmp;
                }
                else {
                    //如果碰到不需要移动的元素，表示是已经排好了顺序的数组， 前面的就不需要比较了。
                    break;
                }
            }
        }
        
        return $arr;
    }
    
    function quickSort($arr)
    {
        $arr         = [1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39];
        $len         = count($arr);
        $base_num    = $arr[0];
        $left_array  = [];
        $right_array = [];
        for ($i = 1; $i < $len; $i++) {
            if ($base_num > $arr[$i]) {
                $left_array[] = $arr[$i];
            }
            else {
                $right_array[] = $arr[$i];
            }
        }
        $left_array  = $this->quickSort($left_array);
        $right_array = $this->quickSort($right_array);
        
        return array_merge($left_array, [$base_num], $right_array);
    }
}

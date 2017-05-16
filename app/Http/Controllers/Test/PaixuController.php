<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaixuController extends Controller
{
    
    /**
     * 二维数组的某一个键名不能重复，把重复的去除
     *
     * @return array
     */
    public function assoc_unique()
    {
        $arr     = [
            ['id' => 1, 'name' => '张三'],
            ['id' => 1, 'name' => '李四'],
            ['id' => 2, 'name' => '王五'],
            ['id' => 3, 'name' => '张三'],
            ['id' => 4, 'name' => '赵六'],
            ['id' => 5, 'name' => '钱七'],
        ];
        $key     = 'id';
        $tmp_arr = [];
        foreach ($arr as $k => $v) {
            if (in_array($v[$key], $tmp_arr))//搜索$v[$key]是否在$temp_arr数组中存在，若存在，则进入判断
            {
                unset($arr[$k]);
            }
            else {
                $tmp_arr[] = $v[$key];
            }
        }
        sort($arr);//sort函数对数组进行排序
        dd($arr);
        
        return $arr;
    }
    
    /**
     * 二维数组里面的一维数组不能完全相同，把相同的一维数组给除去
     *
     * @return array
     */
    public function array_unique_all()
    {
        $temp  = [];
        $temp2 = [];
        $arr   = [
            ['id' => 1, 'name' => '张三'],
            ['id' => 1, 'name' => '张三'],
            ['id' => 2, 'name' => '李四'],
            ['id' => 3, 'name' => '王五'],
            ['id' => 4, 'name' => '赵六'],
            ['id' => 5, 'name' => '钱七'],
        ];
        foreach ($arr as $v) {
            $v      = implode(",", $v);//降维，将一维数组转换成用逗号连接的字符串
            $temp[] = $v;
        }
        $temp = array_unique($temp);//去掉重复的字符串，就是去掉重复的一维数组
        foreach ($temp as $k => $v) {
            $temp[$k] = explode(",", $v);//把之前由二维数组转换过来的一维数组重新转换回去
            //把原来的键名给换回去
            $temp2[$k]['id']   = $temp[$k][0];
            $temp2[$k]['name'] = $temp[$k][1];
        }
        $temp2 = array_merge($temp2);
        dd($temp2);
        
        return $temp2;
    }
    
    /**
     * 最省最快的去重
     *
     * @return array
     */
    function fast_unique()
    {
        $return = [];
        $array  = [
            ['id' => 1, 'name' => '张三'],
            ['id' => 1, 'name' => '张三'],
            ['id' => 2, 'name' => '李四'],
            ['id' => 3, 'name' => '王五'],
            ['id' => 4, 'name' => '张三'],
            ['id' => 5, 'name' => '钱七'],
        ];
        foreach ($array as $key => $v) {
            if (!in_array($v, $return)) {
                $return[$key] = $v;
            }
        }
        $return = array_merge($return);
        dd($return);
        
        return $return;
    }
    
    public function aa()
    {
        $arr    = [
            ['id' => 31, 'name' => 'qwe'],
        ];
        $result = [];
        foreach ($arr as $key => $value) {
            if (!in_array($value, $result)) {
                $result[$key] = $value;
            }
        }
        $result = array_merge($result);
        
        return $result;
    }
    
    public function remove_duplicate()
    {
        
        $result = [];
        $array  = [
            ['id' => 1, 'name' => '张三'],
            ['id' => 1, 'name' => '张三'],
            ['id' => 2, 'name' => '李四'],
            ['id' => 3, 'name' => '王五'],
            ['id' => 4, 'name' => '张三'],
            ['id' => 5, 'name' => '钱七'],
        ];
        $keys   = 'name';
        foreach ($array as $value) {
            $has = false;
            foreach ($result as $val) {
                if ($val[$keys] == $value[$keys]) {
                    $has = true;
                    break;
                }
            }
            if (!$has) {
                $result[] = $value;
            }
        }
        dd($result);
        
        return $result;
    }
    
    public function abc()
    {
        $arr    = ['id' => 123, 'name' => 'dfsdfs'];
        $keys   = 'name';
        $result = [];
        foreach ($arr as $value) {
            $has = false;
            foreach ($result as $val) {
                if ($val[$keys] == $value[$keys]) {
                    $has = true;
                    break;
                }
            }
            if (!$has) {
                $result[] = $value;
            }
        }
        
        return $result;
    }
    
    public function sortNum()
    {
        $a = [
            ['key1' => 23, 'key2' => 'this'],
            ['key1' => 940, 'key2' => 'blah'],
            ['key1' => 894, 'key2' => 'that'],
        ];
        
        return usort($a, 'ascNumSort');
    }
    
    public function ascNumSort($x, $y)
    {
        if ($x['key1'] > $y['key1']) {
            return true;
        }
        elseif ($x['key1'] < $y['key1']) {
            return false;
        }
        else {
            return 0;
        }
    }
}

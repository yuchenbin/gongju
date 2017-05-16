<?php
Route::get(
    '/',
    function () {
        return view('welcome');
    }
);
Route::get('test/index', 'Test\TestOneController@indexAction')->name('test-index');

//排序
Route::get('shuzu/assoc-unique', 'Test\PaixuController@assoc_unique')->name('assoc-unique');
Route::get('shuzu/array-unique', 'Test\PaixuController@array_unique_all')->name('array-unique');
Route::get('shuzu/fast-unique', 'Test\PaixuController@fast_unique')->name('fast-unique');
Route::get('shuzu/remove-duplicate', 'Test\PaixuController@remove_duplicate')->name('remove-duplicate');
Route::get('shuzu/sort-num', 'Test\PaixuController@sortNum')->name('sort-num');

//算法
Route::get('suanfa/bubble-sort', 'Test\SuanfaController@bubbleSort')->name('suanfa-bubble-sort');
Route::get('suanfa/select-sort', 'Test\SuanfaController@selectSort')->name('suanfa-select-sort');
Route::get('suanfa/insert-sort', 'Test\SuanfaController@insertSort')->name('suanfa-insert-sort');
Route::get('suanfa/quick-sort', 'Test\SuanfaController@quickSort')->name('suanfa-quick-sort');

//小工具
Route::get('gongju/jiu-jiu', 'Test\GongjuController@jiuJiu')->name('gongju-jiu-jiu');
Route::get('gongju/select-ip', 'Test\SuanfaController@get_ip')->name('gongju-select-ip');
Route::get('gongju/read-dir', 'Test\GongjuController@readDir')->name('gongju-read-dir');

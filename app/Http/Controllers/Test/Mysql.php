<?php
//连接Mysql
$link = mysql_connect('localhost', 'root', 123456);
if (!$link) {
    die('连接失败' . mysql_error());
}
//选择数据库
mysql_select_db('dbname', $link) or die('不能选择数据库' . mysql_error());

//插入一条信息
$insert = "INSERT INTO books(name,price,autor) VALUE ('PHP','100','ycb'),('JS','90','ycb')";
$result = mysql_query($insert);
if ($result && mysql_affected_rows() > 0) {
    echo "插入成功，插入的ID为" . mysql_insert_id();
}
else {
    echo "插入失败，错误号：" . mysql_errno() . ",错误原因：" . mysql_error();
}

//更新一条信息
$update  = "UPDATE books SET price='200' WHERE name='PHP'";
$result2 = mysql_query($update);
if ($result2 && mysql_affected_rows() > 0) {
    echo "更新成功";
}
else {
    echo "更新失败，错误号：" . mysql_errno() . ",错误原因：" . mysql_error();
}

//删除一条信息
$delete  = "DELETE FROM books WHERE VALUE name='PHP'";
$result3 = mysql_query($delete);
if ($result3 && mysql_affected_rows() > 0) {
    echo "删除成功";
}
else {
    echo "删除失败，错误号：" . mysql_errno() . ",错误原因：" . mysql_error();
}
mysql_close();

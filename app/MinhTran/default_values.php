<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 8/11/2016
 * Time: 10:20 AM
 */
//Hàm tạo mảng mới bằng cách lấy 1 số cột trong mảng cũ
function getToanTuTimKiem()
{
    return array(
        '0' => '=',
        '1' => '>',
        '2' => '>=',
        '3' => '<',
        '4' => '<=',
    );
}
?>
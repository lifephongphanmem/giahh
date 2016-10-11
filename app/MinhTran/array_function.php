<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 8/11/2016
 * Time: 10:20 AM
 */?>
<?php
//Hàm tạo mảng mới bằng cách lấy 1 số cột trong mảng cũ
function a_split($array,$field){
    $kq=array();
    foreach($array as $ar){
        $holding=array();
        foreach($ar as $k => $v){
            if(in_array($k,$field)){
                $holding[$k]=$v;
            }
        }
        $kq[]=$holding;
    }
    return $kq;
}

//Hàm tạo mảng mới bằng cách gộp những giá trị trùng nhau trong mảng cũ lại
function a_unique($array){
    //return array_unique($array,SORT_REGULAR);
    //return array_map('unserialize', array_unique(array_map('serialize', $array)));
    $tmp = array ();
    foreach ($array as $row)
        if(!in_array($row,$tmp)){
            array_push($tmp,$row);
        }
    return $tmp;
}

//Hàm tạo mảng mới bằng cách lấy ra những dòng thỏa mãn điều kiện trong mảng cũ
//$justvals = chỉ lấy phần tử đầu tiên tìm đc
function a_getelement($array, $indexs, $justvals = false){
    $newarray = array();
    if(is_array($array) && count($array)>0){
        if(is_array($indexs) && count($indexs)>0) {
            //Tổng số điều kiện
            $ninds = count($indexs);
        }
        else return $newarray;

        foreach(array_keys($array) as $key){
            //số phần tử thỏa mãn điều kiện
            $count = 0;
            foreach($indexs as $indx => $val){
                if($array[$key][$indx] == $val || strpos(strtolower($array[$key][$indx]), strtolower($val))!==FALSE){
                    $count++;
                }
            }

            if($count == $ninds){
                if($justvals) return $array[$key];
                else $newarray[$key] = $array[$key];
            }
        }
    }
    return $newarray;
}
?>
<?php
function getPermissionDefault($level) {
    $roles = array();

    $roles['T'] = array(
        'hhthitruong' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'hhdvtn' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'hhxnk' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'kkgtw' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'kkgdp' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'tsnnnhadat' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'tsnnotokhac' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'gttruocba' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'gthuetn' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'tdgia' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 1
        ),
        'congbogia' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'ttqd' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1
        ),
    );
    $roles['H'] = array(
        'hhthitruong' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'hhdvtn' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'hhxnk' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkgtw' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'kkgdp' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'tsnnnhadat' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'tsnnotokhac' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'gttruocba' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'gthuetn' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1
        ),
        'tdgia' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1,
        ),
        'congbogia' => array(
            'index' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'approve'=> 1,
        ),
        'ttqd' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0
        ),
    );
    $roles['X'] = array(
        'hhthitruong' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'hhdvtn' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'hhxnk' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'kkgtw' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'kkgdp' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'tsnnnhadat' => array(
            'index' => 0,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'tsnnotokhac' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'gttruocba' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'gthuetn' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'tdgia' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'congbogia' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'approve'=> 0
        ),
        'ttqd' => array(
            'index' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0
        ),
    );

    return json_encode($roles[$level]);
}


function getDayVn($date) {
    if($date != null || $date != '')
        $newday = date('d/m/Y',strtotime($date));
    else
        $newday='';
    return $newday;
}

function getDateTime($date) {
    if($date != null)
        $newday = date('d/m/Y H:i:s',strtotime($date));
    else
        $newday='';
    return $newday;
}

function getDbl($obj) {
    $obj=str_replace(',','',$obj);
    $obj=str_replace('.','',$obj);
    if(is_numeric($obj)){
        return $obj;
    }else
        return 0;
}

function can($module = null, $action = null)
{
    $permission = !empty(session('admin')->permission) ? session('admin')->permission : getPermissionDefault(session('admin')->level);
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function canGeneral($module = null, $action =null)
{
    $model = \App\GeneralConfigs::first();
    $setting = json_decode($model->setting, true);

    if(isset($setting[$module][$action]) && $setting[$module][$action] ==1 )
        return true;
    else
        return false;
}

function canDvCc($module = null, $action = null)
{
    $permission = !empty(session('ttdnvt')->dvcc) ? session('ttdnvt')->dvcc : getDvCcDefault('T');
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function getGeneralConfigs() {
    return \App\GeneralConfigs::all()->first()->toArray();
}

function getDouble($str)
{
    $sKQ = 0;
    $str = str_replace(',','',$str);
    $str = str_replace('.','',$str);
    //if (is_double($str))
        $sKQ = $str;
    return floatval($sKQ);
}

function canshow($module = null, $action = null)
{
    $permission = getShowMenu(getGeneralConfigs()['madv']);
    $permission = json_decode($permission, true);

    //check permission
    if(isset($permission[$module][$action]) && $permission[$module][$action] == 1) {
        return true;
    }else
        return false;

}

function chuyenkhongdau($str)
{
    if (!$str) return false;
    $utf8 = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($utf8 as $ascii => $uni) $str = preg_replace("/($uni)/i", $ascii, $str);
     return $str;
}

function chuanhoachuoi($text)
{
    $text = strtolower(chuyenkhongdau($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "", $text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----", "-", $text);
    $text = str_replace("---", "-", $text);
    $text = str_replace("--", "-", $text);
    return $text;
}

function chuanhoatruong($text)
{
    $text = strtolower(chuyenkhongdau($text));
    $text = str_replace("ß", "ss", $text);
    $text = str_replace("%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "", $text);
    $text = str_replace(array('%20', ' '), '_', $text);
    $text = str_replace("----", "_", $text);
    $text = str_replace("---", "_", $text);
    $text = str_replace("--", "_", $text);
    return $text;
}

function getAddMap($diachi){
    $str = chuyenkhongdau($diachi);
    $str = str_replace(' ','+',$str);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$str.'&sensor=false');
    $output = json_decode($geocode);
    if($output->status == 'OK'){
        $kq = $output->results[0]->geometry->location->lat. ',' .$output->results[0]->geometry->location->lng;
    }else{
        $kq = '';
    }
    return $kq;
}

function getPhanTram1($giatri, $thaydoi){
    $kq=0;
    if($thaydoi==0||$giatri==0){
        return '';
    }
    if($giatri<$thaydoi){
        $kq=round((($thaydoi-$giatri)/$giatri)*100,2).'%';
    }else{
        $kq='-'.round((($giatri-$thaydoi)/$giatri)*100,2).'%';
    }
    return $kq;
}

function getPhanTram2($giatri, $thaydoi){
    if($thaydoi==0||$giatri==0){
        return '';
    }
    return round(($thaydoi/$giatri)*100,2).'%';
}

function ConverToRoman($num){
    $n = intval($num);
    $res = '';

    //array of roman numbers
    $romanNumber_Array = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1);

    foreach ($romanNumber_Array as $roman => $number){
        //divide to get  matches
        $matches = intval($n / $number);

        //assign the roman char * $matches
        $res .= str_repeat($roman, $matches);

        //substract from the number
        $n = $n % $number;
    }

    // return the result
    return $res;
}

function Thang2Quy($thang){
    if($thang == 1 || $thang == 2 || $thang == 3)
        return 1;
    elseif($thang == 4 || $thang == 5 || $thang == 6)
        return 2;
    elseif($thang == 7 || $thang == 8 || $thang == 9)
        return 3;
    else
        return 4;
}

function getDateToDb($value){
    if($value==''){return null;}
    $str =  strtotime(str_replace('/', '-', $value));
    $kq = date('Y-m-d', $str);
    return $kq;
}

function dinhdangso ($number , $decimals = 0, $unit = '1' , $dec_point = ',' , $thousands_sep = '.' ) {
    if(!is_numeric($number) || $number == 0){return '';}
    $r = $unit;

    switch ($unit) {
        case 2:{
            $decimals = 3;
            $r = 1000;
            break;
        }
        case 3:{
            $decimals = 5;
            $r = 1000000;
            break;
        }
    }

    $number = round($number / $r , $decimals);
    return number_format($number, $decimals ,$dec_point, $thousands_sep);
}

?>
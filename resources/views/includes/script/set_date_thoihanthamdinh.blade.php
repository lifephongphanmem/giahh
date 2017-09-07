<?php
/**
 * Created by PhpStorm.
 * User: HuongVu
 * Date: 07/09/2017
 * Time: 8:55 AM
 */
        ?>
<script>
    function add_date(thoidiem,songay){
        var date = new Date();
        if(thoidiem!='' && songay!=''){
        var dt1   = parseInt(thoidiem.substring(0,2));
        var mon1  = parseInt(thoidiem.substring(3,5));
        var yr1   = parseInt(thoidiem.substring(6,10));
        date = new Date(yr1, mon1-1, dt1);
        date.setDate(date.getDate()+parseInt(songay));
        }

        var dd = date.getDate();
        var mm = date.getMonth() + 1;
        var y = date.getFullYear();
        if(dd<10) {
        dd='0'+dd;
        }
        if(mm<10) {
        mm='0'+mm;
        }
        return (dd + '/' + mm + '/' + y);
    }
</script>
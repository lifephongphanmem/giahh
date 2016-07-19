
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <style type="text/css">
        body {
            font: normal 12px/16px time, serif;
        }

        table, p {
            width: 98%;
            margin: auto;
        }

        table tr td:first-child {
            text-align: center;
        }

        td, th {
            padding: 2px;
        }
    </style>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td style="text-align: center; text-transform: uppercase;" width="30%">
            <b>TỔNG CỤC HẢI QUAN</b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>THÔNG TIN VỀ TRỊ GIÁ HÀNG HÓA NHẬP KHẨU</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px; text-transform: uppercase;">
            <b>({{$modelthoidiem->tenthoidiem}} NĂM {{$config->namhethong}})</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Ban hành kèm thông tư số 142/2015/TT-BTC ngày 04 tháng 09 năm 2015 của Bộ tài chính quy định về Cơ sở dữ liệu quốc gia về giá)
        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>TT</th>
        <th>Mã hàng hóa theo danh mục<br>hàng hóa xuất khẩu, nhập<br>khẩu Việt Nam</th>
        <th>Mặt hàng</th>
        <th>Xuất xứ</th>
        <th>ĐVT</th>
        <th>Tổng lượng</th>
        <th>Kim ngạch</th>
        <th>Ghi chú</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
    </tr>
    @foreach($model as $key=>$hh)
        <tr>
            <th>{{$key+1}}</th>
            <th style="text-align: left">{{$hh->masoloai.'.'.$hh->mahh}}</th>
            <th style="text-align: left">{{$hh->tenhh}}</th>
            <th style="text-align: left">{{$hh->nsx}}</th>
            <th>{{$hh->dvt}}</th>
            <th style="text-align: right">{{number_format($hh->soluong)}}</th>
            <th style="text-align: right">{{number_format($hh->kimngach)}}</th>
            <th>{{$hh->gc}}</th>
        </tr>
    @endforeach
</table>
</body>
</html>

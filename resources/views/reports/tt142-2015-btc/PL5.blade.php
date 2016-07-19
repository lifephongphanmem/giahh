
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
            <b>SỞ TÀI CHÍNH TỈNH, THÀNH PHỐ</b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>THÔNG TIN VỀ TÀI SẢN THẨM ĐỊNH GIÁ</b>
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
        <th>STT</th>
        <th>Tên tài<br>sản</th>
        <th>Đặc<br>điểm<br>pháp lý</th>
        <th>Đặc điểm<br>kinh tế, kỹ<br>thuật</th>
        <th>Địa điểm<br>thẩm định<br>giá</th>
        <th>Thời điểm<br>thẩm định<br>giá</th>
        <th>Phương<br>pháp thẩm<br>định giá</th>
        <th>Mục đích<br>thẩm<br>định giá</th>
        <th>Tên đơn vị<br>đề nghị/yêu<br>cầu thẩm<br>định giá</th>
        <th>Giá trị tài<br>sản thẩm<br>định</th>
        <th>Thời hạn sử<br>dụng của kết<br>quả thẩm<br>định giá</th>
        <th>Ghi<br>chú</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>(1)</th>
        <th>(2)</th>
        <th>(3)</th>
        <th>(4)</th>
        <th>(5)</th>
        <th>(6)</th>
        <th>(7)</th>
        <th>(8)</th>
        <th>(9)</th>
        <th>(10)</th>
        <th>(11)</th>
        <th>(12)</th>
    </tr>
    @foreach($model as $key=>$ts)
        <tr>
            <th>{{$key + 1}}</th>
            <th style="text-align: left">{{$ts->tents}}</th>
            <th style="text-align: left">{{$ts->dacdiempl}}</th>
            <th style="text-align: left">{{$ts->thongsokt}}</th>
            <th style="text-align: left">{{$ts->diadiem}}</th>
            <th>{{getDayVn($ts->thoidiem)}}</th>
            <th style="text-align: left">{{$ts->ppthamdinh}}</th>
            <th style="text-align: left">{{$ts->mucdich}}</th>
            <th style="text-align: left">{{$ts->dvyeucau}}</th>
            <th style="text-align: right">{{number_format($ts->giatritstd)}}</th>
            <th>{{getDayVn($ts->thoihan)}}</th>
            <th style="text-align: left">{{$ts->gc}}</th>
        </tr>
    @endforeach
</table>
</body>
</html>

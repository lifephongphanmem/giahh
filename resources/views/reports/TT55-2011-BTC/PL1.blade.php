
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
            <b>BẢNG GIÁ THỊ TRƯỜNG {{$thongtin['thitruong']}} NĂM {{$thongtin['nam']}}</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Ban hành kèm thông tư số 55/2011/TT-BTC ngày 29/4/2011 của Bộ tài chính hướng dẫn chế độ báo cáo giá cả thị trường dùng cho báo cáo giá thị trường tuần, tháng, quý, năm)
        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th rowspan="2">Mã số</th>
        <th rowspan="2">Mặt hàng</th>
        <th rowspan="2">ĐVT</th>
        <th rowspan="2">Giá kỳ trước</th>
        <th rowspan="2">Giá kỳ này</th>
        <th colspan="2">Tăng, giảm</th>
        <th rowspan="2">Ghi chú</th>
    </tr>
    <tr>
        <th>Mức</th>
        <th>%</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6=5-4</th>
        <th>7=5/4</th>
        <th>8</th>

    </tr>
    <tr>
        <th>1</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</table>
</body>
</html>

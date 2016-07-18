
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
            <b>BÁO CÁO CHI TIẾT KẾT QUẢ THẨM ĐỊNH GIÁ</b>
        </td>
    </tr>

</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Hồ sơ <br>thẩm định giá</th>
        <th>Tổng giá trị <br>đề nghị</th>
        <th>Tổng giá trị<br> thực hiện<br> thẩm định</th>
        <th>Tổng giá trị <br>không thực hiện<br> thẩm định</th>
        <th>Tổng giá trị<br> sau thẩm định</th>
        <th>Chênh lệnh</th>
        <th>Tỷ lệ<br>%</th>
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
    @foreach($model as $key=>$ts)
        <tr>
            <th>{{$key+1}}</th>
            <th style="text-align: left">{{$ts->hosotdgia}}</th>
            <th style="text-align: right">{{number_format($ts->sumgiadenghi)}}</th>
            <th style="text-align: right">{{number_format($ts->sumgiathamdinh)}}</th>
            <th style="text-align: right">{{number_format($ts->sumkthamdinh)}}</th>
            <th style="text-align: right">{{number_format($ts->sumgiathamdinh)}}</th>
            <th style="text-align: right">{{number_format($ts->sumkthamdinh)}}</th>
            <th>{{number_format($ts->phantram)}}</th>
        </tr>
    @endforeach
</table>
</body>
</html>

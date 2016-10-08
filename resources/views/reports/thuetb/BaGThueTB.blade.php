
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
            <b>{{getGeneralConfigs()['donvi']}}</b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>BẢNG GIÁ TỐI THIỂU TÍNH THUẾ TRUỚC BẠ <br>
            TRÊN ĐỊA BẠN TỈNH</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Ban hành kèm theo Quyết định số ..{{$model->soqd}}.. ngày ..{{ date("d",strtotime($model->ngaynhap))}}..tháng..{{ date("m",strtotime($model->ngaynhap))}}..năm..{{ date("Y",strtotime($model->ngaynhap))}} của {{getGeneralConfigs()['donvi']}})
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right; font-size: 14px;">
            <i>Đơn vị tính: Đồng</i>
        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th width="40%">Tên hiệu</th>
        <th>Dung tích</th>
        <th>Nước sản xuất</th>
        <th>Giá tối thiểu tính<br> lệ phí trước bạ</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
    </tr>
    @foreach($modelct as $key => $value)
    <tr>
        <td style="text-align: center">{{$key + 1}}</td>
        <td>{{$value->tenhieu}}</td>
        <td style="text-align: center">{{$value->dungtich}}</td>
        <td style="text-align: center">{{$value->nuocsx}}</td>
        <td style="text-align: right">{{number_format($value->giamoi != 0 || $value->giamoi!='' ? $value->giamoi : $value->giaht!=''? $value->giaht : 0)}}</td>
    </tr>
    @endforeach
</table>
</body>
</html>

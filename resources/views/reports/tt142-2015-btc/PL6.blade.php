
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
            <b>CỤC QUẢN LÝ CÔNG SẢN</b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>THÔNG TIN VỀ GIÁ TÀI SẢN THUỘC SỞ HỮU NHÀ NƯỚC</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Tài sản là nhà, đất)
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px; text-transform: uppercase;">
            <b>(NĂM..{{$nam}}..)</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Ban hành kèm thông tư số 142/2015/TT-BTC ngày 04 tháng 09 năm 2015 của Bộ tài chính quy định về Cơ sở dữ liệu quốc gia về giá)
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right; font-size: 14px;">
            <i>ĐVT cho: Diện tích đất, nhà là: Mét vuông; Số lượng là: Cái, Khuân viên; Giá trị là: Nghìn đồng</i>
        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="5">TT</th>
        <th width="30%">Tài sản</th>
        <th width="10%">Số lượng tài sản</th>
        <th width="5%">Số tầng</th>
        <th width="5%">Diện tích</th>
        <th width="8%">Tỷ lệ chất lượng còn lại (%)</th>
        <th width="20%">Nguyên giá</th>
        <th width="20%">Giá trị còn lại</th>
    </tr>
    @if(count($model)>0)
    @foreach($model as $key=>$tt)
    <tr>
        <th style="text-align: center">{{$key+1}}</th>
        <th style="text-align: left">{{$tt->tents}}</th>
        <th style="text-align: center">{{number_format($tt->slts)}}</th>
        <th style="text-align: center">{{number_format($tt->sotang)}}</th>
        <th style="text-align: center">{{number_format($tt->dientich)}}</th>
        <th style="text-align: center">{{number_format($tt->tyleclcl)}}</th>
        <th style="text-align: right">{{number_format($tt->nguyengia)}}</th>
        <th style="text-align: right">{{number_format($tt->giatricl)}}</th>
    </tr>
    @endforeach
    @else
        <tr>
            <td colspan="8">Không có thông tin về tài sản</td>
        </tr>
    @endif
</table>
</body>
</html>

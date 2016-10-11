
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
            <b>@if(session('admin')->level == 'T')
                   {{getGeneralConfigs()['donvi']}}
               @else
                    {{session('admin')->name}}
               @endif
            </b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px;">
            <b>BÁO CÁO CHI TIẾT CÔNG BỐ GIÁ VẬT LIỆU VÀ CÔNG BỐ GIÁ BỔ XUNG</b>
            <br>
            <br>
            Từ ngày: {{getDayVn($dk['ngaytu'])}} - Đến ngày {{getDayVn($dk['ngayden'])}}
            @if(session('admin')->level == 'T')
                @if($donvi != 'all')
                    <br>Đơn vị: {{$donvi->ten}}
                @endif
            @endif
        </td>
    </tr>

</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Số văn bản đề nghị CBBS</th>
        <th>Đơn vị đề nghị CBBS</th>
        <th>Số Thông báo kết luận CBBS</th>
        <th>Tổng giá trị đề nghị</th>
        <th>Tổng giá trị thực hiện CBBS</th>
        <th>Tổng giá trị không thực hiện CBBS</th>
        <th>Tổng giá trị sau CBBS</th>
        <th>Chênh lệch</th>
        <th>Tỷ lệ %</th>
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
        <th>9</th>
        <th>10</th>
    </tr>
    @if(count($model))
    @foreach($arraynam as $key=>$nam)
        <tr>
            <td></td>
            <td colspan="9" style="text-align: left"><b>Năm {{$nam}}</b></td>
        </tr>
        @foreach($arrayquy as $key=>$quy)
            <tr>
                <td></td>
                <td colspan="9" style="text-align: left"><b>Quý {{$quy}}</b></td>
            </tr>
            @foreach($arraythang as $key=>$thang)
                <tr>
                    <td></td>
                    <td colspan="9" style="text-align: left"><b> Tháng {{$thang}}</b></td>
                </tr>
                @foreach($model as $key=>$ts)
                    @if($thang == $ts->thang && $nam == $ts->nam && $quy == $ts->quy)
                    <tr>
                        <th>{{$key+1}}</th>
                        <th>{{$ts->sovbdn}}</th>
                        <th style="text-align: left">{{$ts->donvidn}}</th>
                        <th>{{$ts->sotbkl}}</th>
                        <th style="text-align: right">{{number_format($ts->sumgiadenghi)}}</th>
                        <th style="text-align: right">{{number_format($ts->sumththamdinh)}}</th>
                        <th style="text-align: right">{{number_format($ts->sumkththamdinh)}}</th>
                        <th>{{number_format($ts->sumgiathamdinh)}}</th>
                        <th>{{number_format($ts->sumchenhlech)}}</th>
                        <th>{{$ts->phantram}}</th>
                    </tr>
                    @endif
                @endforeach
            @endforeach
        @endforeach
    @endforeach
    @else
        <tr>
            <th colspan="10">Không có hồ sơ công bố</th>
        </tr>
    @endif
</table>
</body>
</html>

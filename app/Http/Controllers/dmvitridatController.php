<?php

namespace App\Http\Controllers;

use App\dmqd_giadat;
use App\dmvitridat;
use App\giadaugiadat;
use App\giathuedat;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class dmvitridatController extends Controller
{
    public function index_danhmuc($macapdo)
    {
        if (Session::has('admin')) {
            $model_danhmuc = dmvitridat::all();
            $model_thuedat = giathuedat::all();
            $model_daugia = giadaugiadat::all();

            $model = dmvitridat::where('maso','like',$macapdo.'%')->get();
            $model_diaban = $model_danhmuc->where('capdo','1');
            $model_quyetdinh = dmqd_giadat::all();
            foreach($model as $ct){
                $ct->b_xoa = true; //mặc định đc xóa
                //kiểm tra nếu mã số dc sử dụng thì ko dc xóa
                if($model_danhmuc->where('magoc',$ct->maso)->count() > 0
                    ||$model_thuedat->where('maso',$ct->maso)->count() > 0
                    ||$model_daugia->where('maso',$ct->maso)->count() > 0){
                    $ct->b_xoa = false;
                }
            }
            return view('manage.giadat.vitri.danhmuc.index')
                ->with('model',$model)
                ->with('model_diaban',$model_diaban)
                ->with('model_quyetdinh',$model_quyetdinh)
                ->with('macapdo',$macapdo)
                ->with('url','/giadat/vitri/')
                ->with('pageTitle','Danh mục vị trí đất');

        }else
            return view('errors.notlogin');
    }

    public function add_diaban(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $madiaban = getDbl(dmvitridat::where('capdo','1')->max('maso')) + 1;
        $inputs = $request->all();
        $inputs['maso'] = $madiaban;
        $inputs['macapdo'] = $madiaban;
        $inputs['capdo'] = 1;
        $inputs['mahuyen'] = session('admin')->mahuyen;
        dmvitridat::create($inputs);
        $result['message'] = 'Thêm mới thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function add_node(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        $model = dmvitridat::all();
        $node_cha = $model->where('maso',$inputs['maso'])->first();

        if(count($node_cha)== 0) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $macapdo = getDbl($model->where('magoc',$inputs['maso'])->max('macapdo')) + 1;
        $inputs['capdo'] = $node_cha->capdo + 1;
        $inputs['maso'] = $node_cha->maso .'.'.$macapdo;
        $inputs['magoc'] = $node_cha->maso;
        $inputs['macapdo'] = $macapdo;
        $inputs['mahuyen'] = session('admin')->mahuyen;
        dmvitridat::create($inputs);
        $result['message'] = 'Thêm mới thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function update_node(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        $model = dmvitridat::where('maso',$inputs['maso'])->first();
        if(count($model)== 0) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs['giadat'] = getDbl($inputs['giadat']);
        $model->update($inputs);
        $result['message'] = 'Cập nhật thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function get_node(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();
        $model = dmvitridat::all();
        $model_quyetdinh = dmqd_giadat::all();

        $node = $model->where('maso',$inputs['maso'])->first();
        if(count($node)== 0) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $sub_node = $model->where('magoc',$inputs['maso'])->count()>0? true:false;

        $result['message'] = '<div class="modal-body" id="edit_node">';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên khu vực / vị trí<span class="require">*</span></label>';
        $result['message'] .= '<textarea name="edit_vitri" id="edit_vitri" class="form-control">'.$node->vitri;
        $result['message'] .= '</textarea></div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Giá đất<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_giadat" id="edit_giadat" class="form-control" data-mask="fdecimal" value="'.$node->giadat.'" '.($sub_node==true?'readonly':'').'/>';
        $result['message'] .= '<input type="hidden" name="edit_maso" id="edit_maso" class="form-control" value="'.$node->maso.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Căn cứ quyết định</label>';
        $result['message'] .= '<select name="edit_soquyetdinh" id="edit_soquyetdinh" class="form-control">';
        foreach($model_quyetdinh as $ct){
            $result['message'] .= '<option value="'.$ct->soquyetdinh.'"'.($ct->soquyetdinh==$node->soquyetdinh?' selected':'').'>'. $ct->mota.'</option>';
        }
        $result['message'] .= '</select></div></div>';
        $result['message'] .= '</div>';


        $result['message'] .= '</div>';
        $result['status'] = 'success';


        die(json_encode($result));
    }

    public function getvitri(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        $model = dmvitridat::all();
        $model_diaban = $model->where('capdo', '1');
        $madiaban = $inputs['madiaban'];
        $model_phanloai = $model->where('magoc', $madiaban);

        //nếu chọn cấp 1 thì mã phân loại = first
        //không có =>set ''
        if (count($model_phanloai) > 0 && $inputs['capdo'] < 2) {
            $maphanloai = $model_phanloai->first()->maso;
        } else {
            $maphanloai = count($model_phanloai) > 0 ? $inputs['maphanloai'] : '';
        }

        $model_vitri = $model->where('magoc', $maphanloai);

        //$mavitri = $inputs['capdo'] <3 ? $model_vitri->first()->maso : $inputs['mavitri'];

        //nếu chọn cấp 1 thì mã phân loại = first
        //không có =>set ''
        if (count($model_vitri) > 0 && $inputs['capdo'] < 3) {
            $mavitri = $model_vitri->first()->maso;
        } else {
            $mavitri = count($model_vitri) > 0 ? $inputs['mavitri'] : 'RONG';
        }

        $model_danhmuc = dmvitridat::where('magoc', 'like', $mavitri . '%')->get();
        //dd($model_danhmuc);
        $a_kq = new Collection();
        foreach ($model_danhmuc as $ct) {
            $kiemtra = $model_danhmuc->where('magoc', $ct->maso);
            if (count($kiemtra) == 0) {
                $tenvitri = '';
                $a_vitri = explode('.', $ct->magoc);
                $maso = $a_vitri[0];
                foreach ($a_vitri as $key => $val) {
                    $vitri = $model->where('maso', $maso)->first();
                    if (isset($vitri) && $key > 2) {
                        $tenvitri .= ($vitri->vitri . ' - ');
                    }
                    $maso .= ('.' . $val);
                }
                $ct->vitri = $tenvitri . $ct->vitri;
                $a_kq->add($ct);
            }
        }

        $result['message'] = '<div class="modal-body" id="vitridat">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-4">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Địa bàn quản lý</label>';
        $result['message'] .= '<select name="madiaban" id="madiaban" class="form-control">';
        foreach($model_diaban as $ct){
            $result['message'] .= '<option value="'.$ct->maso.'"'.($ct->maso==$madiaban?' selected':'').'>'. $ct->vitri.'</option>';
        }
        $result['message'] .= '</select></div></div>';

        $result['message'] .= '<div class="col-md-4">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Phân loại giá đất</label>';
        $result['message'] .= '<select name="maphanloai" id="maphanloai" class="form-control">';
        foreach($model_phanloai as $ct){
            $result['message'] .= '<option value="'.$ct->maso.'"'.($ct->maso==$maphanloai?' selected':'').'>'. $ct->vitri.'</option>';
        }
        $result['message'] .= '</select></div></div>';

        $result['message'] .= '<div class="col-md-4">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Vị trí, khu vực đất</label>';
        $result['message'] .= '<select name="mavitri" id="mavitri" class="form-control">';
        foreach($model_vitri as $ct) {
            $result['message'] .= '<option value="'.$ct->maso.'"'.($ct->maso==$mavitri?' selected':'').'>'. $ct->vitri.'</option>';
        }
        $result['message'] .= ' </select ></div></div >';
        $result['message'] .= '</div>';

        $result['message'] .= '<table class="table table-striped table-bordered table-hover" id = "sample_3" >';
        $result['message'] .= '<thead>';
        $result['message'] .= ' <tr>';
        $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
        $result['message'] .= '<th style = "text-align: center"> Vị trí thửa đất </th >';
        $result['message'] .= '<th style = "text-align: center"> Giá đất </th >';
        $result['message'] .= '<th style="text-align: center">Thao tác</th>';
        $result['message'] .= ' </tr>';
        $result['message'] .= '</thead>';

        $result['message'] .= ' <tbody>';
        foreach ($a_kq as $key => $tt) {
            $result['message'] .= '<tr>';
            $result['message'] .= '<td style = "text-align: center">' . ($key + 1) . '</td >';
            $result['message'] .= '<td name="vitri">'.$tt->vitri.'</td>';
            $result['message'] .= '<td name="giadat">'.number_format($tt->giadat).'</td>';
            $result['message'] .= '<td>';
            $result['message'] .= '<button type = "button" onclick = "set_vitri(this,&#39;' . $tt->maso . '&#39;)" class="btn btn-default btn-xs mbs" data - target = "#dinhkem-modal-confirm" data - toggle = "modal" ><i class="fa fa-trash-o" ></i >&nbsp;Lấy vị trí </button>';
            $result['message'] .= '</td>';
            $result['message'] .= '</tr>';
        }
        $result['message'] .= '</tbody>';
        $result['message'] .= '</table>';

        $result['message'] .= '</div>';
        $result['status'] = 'success';


        die(json_encode($result));
    }

    public function destroy(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model=  dmvitridat::findOrFail($inputs['iddelete']);
            $model->delete();
            return redirect('/giadat/vitri/danh_muc/ma_so=ALL');
        }else
            return view('errors.notlogin');
    }
}

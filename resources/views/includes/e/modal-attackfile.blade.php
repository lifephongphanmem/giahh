<div id="dinhkem-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'approve','id' => 'frm_dinhkem'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Danh sách tài liệu đính kèm</h4>
            </div>
            <div class="modal-body" id="dinh_kem">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">File đính kèm 1</label>
                            @if(isset($model->filedk))
                                <p><a href="{{url('/data/uploads/attack/'.$model->filedk)}}" target="_blank">{{$model->filedk}}</a></p>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">File đính kèm 2</label>
                            @if(isset($model->filedk1))
                                <p><a href="{{url('/data/uploads/attack/'.$model->filedk1)}}" target="_blank">{{$model->filedk1}}</a></p>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">File đính kèm 3</label>
                            @if(isset($model->filedk2))
                                <p><a href="{{url('/data/uploads/attack/'.$model->filedk2)}}" target="_blank">{{$model->filedk2}}</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">File đính kèm 4</label>
                            @if(isset($model->filedk3))
                                <p><a href="{{url('/data/uploads/attack/'.$model->filedk3)}}" target="_blank">{{$model->filedk3}}</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">File đính kèm 5</label>
                            @if(isset($model->filedk4))
                                <p><a href="{{url('/data/uploads/attack/'.$model->filedk4)}}" target="_blank">{{$model->filedk4}}</a></p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

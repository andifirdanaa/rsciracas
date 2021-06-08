@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'banner'
])

@section('content')
    <div class="content">
        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <div class="col-md-12 text-center">
                <form class="col-md-12" action="{{ route('banner.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Edit Banner') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Preview Image Lama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <img  src="{{asset('images/'.$data->id.'/'.$data->image)}}" id="preview" width="350px" style="margin-top:10px" />
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Image') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="file" name="image" id ="image_id" class="form-control" 
                                        onchange="tampilkanPreview(this,'preview')">
                                        <img id="preview" width="350px" style="margin-top:10px" />
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Short Desc') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="short_desc" class="form-control" placeholder="short desc" value="{{$data->short_desc}}">
                                    </div>
                                    @if ($errors->has('short_desc'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('short_desc') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Status') }}</label>
                                    <div class="col-md-9">
                                        <select id="status_id" name="status" class="form-control" value="{{$data->status}}">
                                            <option value="1">Aktif</option>
                                            @if($data->status == 0)
                                                <option value="0" selected>Non Aktif</option>
                                            @else
                                                <option value="0">Non Aktif</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                    <a href="{{route('banner.index')}}" class="btn btn-info btn-round" type="button">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    function tampilkanPreview(userfile, idpreview) {
        var gb = userfile.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function (element) {
                    return function (e) {
                        element.src = e.target.result;
                    };
                })(preview);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else {
                //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    }
</script>
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'banner'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="col-md-12 text-center">
                <form class="col-md-12" action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Create Banner') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Image') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="file" name="image" id ="image_id" class="form-control"  onchange="tampilkanPreview(this,'preview')">
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
                                        <input type="text" name="short_desc" class="form-control" placeholder="short desc">
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
                                    <div class="form-group">
                                        <select id="status_id" name="status" class="form-control">
                                            <option value="1">Aktif</option>
                                            <option value="0">Non Aktif</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
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
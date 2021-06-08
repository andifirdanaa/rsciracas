@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'modul'
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
                <form class="col-md-12" action="{{ route('modul.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Edit Modul') }}</h5>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Modul') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="modul" class="form-control" placeholder="Modul" value="{{$data->modul}}">
                                    </div>
                                    @if ($errors->has('modul'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('modul') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Url') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="url" class="form-control" placeholder="Url" value="{{$data->url}}">
                                    </div>
                                    @if ($errors->has('url'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('url') }}</strong>
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
                                    <a href="{{route('modul.index')}}" class="btn btn-info btn-round" type="button">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
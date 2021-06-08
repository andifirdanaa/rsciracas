@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'modul'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="col-md-12 text-center">
                <form class="col-md-12" action="{{ route('modul.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Create Modul') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Name Modul') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="modul" class="form-control" placeholder="Modul">
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
                                        <input type="text" name="url" class="form-control" placeholder="Url">
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
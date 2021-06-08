@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'akses_modul'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="col-md-12 text-center">
                <form class="col-md-12" action="{{ route('akses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Create Akses Modul') }}</h5>
                        </div>
                        <div class="card-body">
                           <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Modul') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select id="modul_id_id" name="modul_id" class="form-control">
                                            @foreach($modul as $item)
                                            <option value="{{$item->id}}">{{$item->modul}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('modul_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('modul_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('User Role') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select id="user_role_id_id" name="user_role_id" class="form-control">
                                            @foreach($user_role as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('user_role_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('user_role_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                    <a href="{{route('akses.index')}}" class="btn btn-info btn-round" type="button">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
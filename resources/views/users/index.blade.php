@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')

<div class="content">
        <!-- @if ('status')
            <div class="alert alert-success" role="alert">
                {{'status'}}
            </div>
        @endif -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-sm-12">
                                <h3 class="mb-0">Users</h3>
                                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Add user</a>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                            <form>
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                    <button class="input-group-append border-0" style="cursor: pointer;">
                                        <div class="input-group-text border-0">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Creation Date</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $i => $data)
                                            <tr>
                                                <td>{{ ++$i + ($users->currentPage()-1) * $users->perPage() }}</td>
                                                <td>{{$data->name}}</td>
                                                <td>
                                                    {{$data->email}}
                                                </td>
                                                <td>{{$data->created_at}}</td>
                                                <td class="text-center">
                                                <form action="{{ route('user.destroy',$data->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('user.edit',$data->id) }}">Edit</a>
                                 
                                                    @csrf
                                                    @method('DELETE')
                                 
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                                </form>
                                        </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                                <div class="paginate text-center">
                                    {{ $users->links() }}
                                </div>
                            </div>
                            <div class="card-footer py-4">
                                <nav class="d-flex justify-content-end" aria-label="...">          
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    


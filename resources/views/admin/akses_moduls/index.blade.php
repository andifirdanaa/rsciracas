@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'akses_modul'
])

@section('content')

<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Akses Modul</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('akses.create')}}" type="button" style="text-decoration: none;" class="btn btn-sm btn-primary">Create</a>
                            </div>
                            <div class="col-md-6">
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Modul
                                        </th>
                                        <th>
                                            Role
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($akses as $i => $item)
                                    <tr>
                                        <td>
                                            {{ ++$i + ($akses->currentPage()-1) * $akses->perPage() }}
                                        </td>
                                        <td>
                                            {{ $item->Modul->modul }}
                                        </td>
                                        <td>
                                            {{ $item->user_role_id }}
                                        </td>
                                        <td class="text-center">
                                                <form action="{{ route('akses.destroy',$item->id) }}" method="POST">
                                 
                                                   <!--  <a class="btn btn-info btn-sm" href="{{ route('banner.show',$item->id) }}">Show</a> -->
                                 
                                                    <a class="btn btn-primary btn-sm" href="{{ route('akses.edit',$item->id) }}">Edit</a>
                                 
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
                                    {{ $akses->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    


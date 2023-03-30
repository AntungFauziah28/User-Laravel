@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
<button type="button" class="d-none d-sm-inline-block btn btn-sm
btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalScrollable">
<i class="fa fa-plus fa-sm text-white-50"></i> Tambah
</button>
</div>
<br>
<div class="row justify-content-end">
        <div class="col-md-3">
          <form action='/supplier' method="GET">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{Request::get('search')}}">
                      <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
      </div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr align="center">
            <th width="5%">User Id</th>
            <th width="10%">Nama</th>
            <th width="20%">Email</th>
            <th width="15%%">Aksi</th>
            <th width="5%">Roles 1</th>
            <th width="5%">Roles 2</th>
          </tr>
        </thead>
          <tbody>
          @foreach($user as $key => $row)
            <tr>
            <td>{{ $user->firstItem() + $key }}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->email}}</td>

              <td align="center">
              <a href="{{route('user.edit' ,[$row->id])}}"
              class="d-none d-sm-inline-block btn btn-sm btn-success ti-pencil-alt shadow-sm">
                 </a>
                 <a href="/user/hapus/{{ $row->id }}"
                onclick="return confirm('Yakin Ingin menghapus data?')"
                class="d-none d-sm-inline-block btn btn-sm btn-danger ti-eraser shadow-sm">
                 </a>

              </td>
              @foreach($row->roles as $r)
                <td>
                  {{$r->id}}
                </td>
              @endforeach
           </tr>
          @endforeach
        </tbody>
      </table>
      <div class="pull-left">
        Showing
        {{ $user->firstItem() }}
        to
        {{ $user->lastItem() }}
        of
        {{ $user->total() }}
        entries
      </div>
      <div class="pull-right">
        {{ $user->links() }}
      </div>


    </div>
  </div>
</div>
<!-- Modal Add Data -->
<div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-xs">
     <form name="frm_add" id="frm_add" class="form-horizontal" action="#"
      method="POST" enctype="multipart/form-data">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data User</h4>
          </div>
            <div class="modal-body">
              <div class="form-group">
                <label class="col-lg-10 control-label">Nama User</label>
                  <div class="col-lg-10">
                    <input type="text" name="username" required class="form-control">
              </div>
                      <div class="form-group">
                        <label class="col-lg-10 control-label">Email User</label>
                          <div class="col-lg-10">
                            <input type="email" name="email" required class="form-control">
                      </div>
                        <div class="form-group">
                            <label class="col-lg-10 control-label">Roles/Akses</label>
                              <div class="col-lg-10">
                                  <select id="roles" name="roles" class="form-control" required>
                                    <option value="">--Pilih Roles--</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="user">User</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
    @endsection









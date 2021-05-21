@extends('layout.v_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Device</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Device</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              @if (session('pesan'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{session('pesan')}}
              </div>
              @endif
             {{--  <a href="" type="button" class="btn btn-outline-success">
                Add Data <i class="fa fa-plus"></i>
              </a> --}}
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add Data <i class="fa fa-plus"></i>
              </button>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th style="width: 20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $d)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$d->code}}</td>
                      <td>{{$d->codeName()}}</td>
                      <td>{{$d->status}}</td>
                      {{-- <td> --}}
                        {{-- @if($d->status == 1) --}}
                        {{-- Nonaktif --}}
                        {{-- @elseif($d->status == 2) --}}
                        {{-- Aktif --}}
                        {{-- @endif --}}
                      {{-- </td> --}}
                      <td>
                        <a href="#" data-toggle="modal" data-target="#exampleModal{{$d->id}}" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Edit</a>
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalDelete{{$d->id}}"><i class="fa fa-trash-alt"></i>Delete</a>
                      </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('/device'. '/' .$d->id)}}" method="post">
                              @csrf
                              @method('put')
                              <div class="form-group row">
                                <label for="">Code</label>
                                <input type="text" class="form-control" name="code" placeholder="Code" value="{{$d->code}}">
                              </div>
                              <div class="form-group row">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$d->name}}">
                              </div>
                              <div class="form-group row">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                  <option value="{{$d->status}}">{{$d->status}}</option>
                                  <option value="2">AKTIF</option>
                                  <option value="1">NON AKTIF</option>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="exampleModalDelete{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('/device'. '/' .$d->id)}}" method="post">
                              @csrf
                              @method('delete')
                              <label for="">Do you want to delete this data?</label>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            @csrf
            <div class="form-group row">
              <label for="">Code</label>
              <input type="text" class="form-control" name="code" placeholder="Code">
            </div>
            <div class="form-group row">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group row">
              <label for="">Status</label>
              <select name="status" id="" class="form-control">
                <option value="" selected disabled>-- Select Status --</option>
                <option value="2">AKTIF</option>
                <option value="1">NON AKTIF</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
@extends('admin.layout.main')


@section('body')
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Company</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{url('/admins/companies')}}" class="login-form" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Website</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Website" name="website">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter Website" name="file">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Companies</h3>
                <button class="btn btn-info" style="float:right;" data-toggle="modal" data-target="#modal-default">Add</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th >Logo</th>
                      <th>Website</th>
                      <th>Action</th>

                      
                    </tr>
                  </thead>
                  <tbody>
                    @php  $r=0; @endphp
                  @foreach($user as $row)
                                      @php  $r++; @endphp

                    <tr>
                      <td>{{$r}}</td>
                      <td>{{$row->name}} 
                      </td>
                      <td>
                        {{$row->email}}
                      </td>
                      <td><img src="{{asset('upload/images/'.$row->logo)}}" alt="" style="width: 15%"></td>
                      
                      <td>{{$row->website}}</td>
                      <td>
                          <a href="{{url('/admins/companies/'.$row->id.'/edit')}}">
                            <button class="btn btn-info"  style="min-width: 103px !important;">Edit</button></a>
                          
                          <form action="{{ url('/admins/companies/' .$row->id) }}" method="POST">@method('DELETE')@csrf<button class="btn btn-danger">Delete</button></form>
                        </td>

                    </tr>

                    @endforeach
                    
                  </tbody>
                </table>
                    {!! $user->links() !!}

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->





<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('AdminLTE/plugins/toastr/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<script>
     




    @if(session('success'))
    toastr.success("{{ session('success') }}");
    @endif
    @if(session('errory'))
    toastr.error("{{ session('errory') }}");
    @endif

    @if(session('errors'))

            @foreach ($errors->all() as $error)
            toastr.error("{{$error}}");

            @endforeach
    @endif






</script>


@endsection
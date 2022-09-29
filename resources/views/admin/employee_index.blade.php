@extends('admin.layout.main')


@section('body')
 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{url('/admins/Employee_save')}}" class="login-form" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" name="first_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" name="last_image">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone" name="phone">
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Company</label>
                      <select class="form-control" name="company_id">
                          @foreach($user as $compay)
                          <option value="{{$compay->id}}">{{$compay->name}}</option>
                          @endforeach
                      </select>
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
                <h3 class="card-title">Employee</h3>
                <button class="btn btn-info" style="float:right;" data-toggle="modal" data-target="#modal-default">Add</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>{{ __('table.First_Name') }}</th>
                      <th>{{ __('table.Last_Name') }}</th>
                      <th>{{ __('table.Emial') }}</th>
                      <th>{{ __('table.Phone') }}</th>
                      <th>Campany</th>
                      <th>Action</th>

                      
                    </tr>
                  </thead>
                  <tbody>
                    @php  $r=0; @endphp
                  @foreach($emp as $row)
                                      @php  $r++; @endphp

                    <tr>
                      <td>{{$r}}</td>
                      <td>{{$row->first_name}} 
                      </td>
                      <td>{{$row->last_image}} 
                      </td>
                      <td>
                        {{$row->email}}
                      </td>
                      <td>{{$row->phone}}</td>
                      
                      <td>{{$row->campanyname->name}}</td>
                      <td>
                          <a href="{{url('/admins/Employee/'.$row->id.'/edit')}}">
                            <button class="btn btn-info"  style="min-width: 103px !important;">Edit</button></a>
                          
                          <a href="{{url('/admins/Employee/'.$row->id.'/delete')}}">
                          <button class="btn btn-danger">Delete</button></a>
                        </td>

                    </tr>

                    @endforeach
                    
                  </tbody>
                </table>
                    {!! $emp->links() !!}

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
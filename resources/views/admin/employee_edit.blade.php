@extends('admin.layout.main')


@section('body')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form method="POST" action="{{url('/admins/Employee_update/' .$emp->id)}}" class="login-form" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter First Name" name="first_name" value="{{$emp->first_name}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name" name="last_image" value="{{$emp->last_image}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$emp->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone" name="phone" value="{{$emp->phone}}">
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Company</label>
                      <select class="form-control" name="company_id">
                          @foreach($user as $compay)
                          <option value="{{$compay->id}}"     @if($compay->id ==$emp->company_id)
        selected="selected"
    @endif
>{{$compay->name}}</option>
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
@extends('home')

@section('content')
@if(Auth::user()->usertype == 'adm')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manage Employees</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>First Name</th>
        <th>Second Name</th>
        <th>Report</th>
        <th width="280px">Action</th>
      </tr>
      @foreach ($data as $key => $value)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->secondname }}</td>
        <td><a href="{{Route('generatereport',$value->email,['download'=>'pdf']) }}" class=""><i class="fas fa-fw fa-download"></i> </a></td>
        <td>

          <a class="" href="" data-toggle="modal" data-target="#productviewmodal{{$value->id}}"><i class="fas fa-fw fa-info"></i></a>
          <!-- <a href="{{route('deleteUser',$value->id)}}" type="button" class="btn btn-danger">OK</a>
        <a href="{{route('manage')}}" type="button" class="btn btn-success" style="float: right;">Cancel</a> -->

          <a href="#" class="" data-toggle="modal" data-target="#producteditmodal{{$value->id}}"><i class="fas fa-fw fa-edit"></i></a>
          <a href="" class="" data-toggle="modal" data-target="#productdeletemodal{{$value->id}}"><i class="fas fa-fw fa-trash-alt"></i></a>

        </td>
      </tr>

      <!-- Edit gallery -->

      <div class="modal fade" id="producteditmodal{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editmodal">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{URL::to('/update',$value->id) }}" method="POST">
              @csrf


              <div class="row " style="padding-left: 10px;padding-right: 10px;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="name" value="{{ $value->name }}" class="form-control" placeholder="First Name">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Second Name:</strong>
                    <input type="text" name="secondname" value="{{ $value->secondname }}" class="form-control" placeholder="Second Name">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" value="{{ $value->phone }}" class="form-control" placeholder="Phone">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $value->email }}" class="form-control" placeholder="Email">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Usertype:</strong>
                    <input type="text" name="usertype" value="{{ $value->usertype }}" class="form-control" placeholder="Usertype">
                  </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

      <!-- ------END OF EDIT-------- -->

      <div class="modal fade" id="productviewmodal{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editmodal">View Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="row " style="padding-left: 10px;padding-right: 10px;">
              <div class="col-xs-12 col-sm-12 col-md-12 col-pd-12 ">
                <div class="form-group">
                  <strong class="">First Name:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->name }}</label>

                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Second Name:</strong>
                  <label class="offset-md-2 col-md-4">{{ $value->secondname }}</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Phone:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->phone }}</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Email:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->email }}</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Usertype:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->usertype }}</label>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- DELETE -->
      <div class="modal fade" id="productdeletemodal{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editmodal">Delete an Employeee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div>
              <h1 class="modal-title">Are you serious, You need to move this Employee????</h1>
            </div>
            <div style="padding-bottom: 10px;padding-right: 10px;padding-left: 10px;" class="modal-footer">
              <form action="{{route('deleteUser',$value->id)}}" method="POST">

                <a href="{{route('manage')}}" type="button" class="btn btn-success" style="float: right;">Cancel</a>
                @csrf

                <button type="submit" class="btn btn-danger">OK</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- END OF DELETE -->

      @endforeach
    </table>
    {!! $data->links() !!}
  </div>
</div>
@endif

@endsection
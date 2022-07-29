@extends('home')

@section('content')

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
        <th>Date</th>
        <th width="280px">Action</th>
      </tr>
      @foreach ($data as $key => $value)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->secondname }}</td>
        <td>{{ $value->created_at }}</td>
        <td>

          <a class="" href="" data-toggle="modal" data-target="#productviewmodal{{$value->id}}"><i class="fas fa-fw fa-"></i>show</a>
          <!-- <a href="{{route('deleteUser',$value->id)}}" type="button" class="btn btn-danger">OK</a>
        <a href="{{route('manage')}}" type="button" class="btn btn-success" style="float: right;">Cancel</a> -->

          <!-- <a href="#" class="" data-toggle="modal" data-target="#producteditmodal{{$value->id}}"><i class="fas fa-fw fa-edit"></i></a>
          <a href="" class="" data-toggle="modal" data-target="#productdeletemodal{{$value->id}}"><i class="fas fa-fw fa-trash"></i></a> -->

        </td>
      </tr>


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
                  <strong>Age:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->age }}</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Residence:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->residence }}</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Group Name:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->groupname }}</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Description:</strong>
                  <label class="offset-md-3 col-md-4">{{ $value->description }}</label>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


      @endforeach
    </table>
    {!! $data->links() !!}
  </div>
</div>


@endsection
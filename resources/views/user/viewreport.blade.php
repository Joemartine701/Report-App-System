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
        <th>Name</th>
        <th>Phone Number</th>
        <th>Date</th>
        <th>Description</th>
      </tr>
      
      @foreach ($data as $key => $value)
      @if(Auth::user()->email == $value->userId)
      <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->phone }}</td>
        <td>{{ $value->created_at }}</td>
        <td>

          <a class="btn btn-info" href="" data-toggle="modal" data-target="#productviewmodal{{$value->id}}">Show</a>

        </td>
      </tr>
      
      <!-- ------SHOW-------- -->

      <div class="modal fade" id="productviewmodal{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editmodal">View Description</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div style="padding-left: 2%;padding-bottom: 10%;padding-top: 5%;">
            {{ $value->description }}
            </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
      
    </table>
    {!! $data->links() !!}
  </div>
</div>


@endsection
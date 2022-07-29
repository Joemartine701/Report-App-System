@extends('home')

@section('content')

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          <a href="http://"> View Report (per day)</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                       <a href="">View Report(per week)</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                           <a href="">View Report (per Monthly)</a> 
                        </div>
                        <div class="row no-gutters align-items-center">
  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          <a href="http://">View Report (per Monthly)</a>  </div>
                      
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Approach -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Customer Details</h6>
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

        <form action="{{ URL::to('/collect') }}" method="POST">

            @csrf

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name :') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" placeholder="Enter Receiver Name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="secondname" value="{{ __('Second Name :') }}" />
                <x-jet-input id="secondname" class="block mt-1 w-full" type="text" name="secondname" required autofocus autocomplete="secondname" placeholder="Enter Second Name" />
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone Number :') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" required autofocus autocomplete="phone" placeholder="Enter Receiver Phone Number" />
            </div>
            <div class="mt-4">
                <x-jet-label for="age" value="{{ __('Age :') }}" />
                <x-jet-input id="age" class="block mt-1 w-full" min="1" max="200" type="number" name="age" required autofocus autocomplete="age" placeholder="Enter Receiver Age" />
            </div>
            <div class="mt-4">
                <x-jet-label for="residence" value="{{ __('Residence :') }}" />
                <x-jet-input id="residence" class="block mt-1 w-full" type="text" name="residence" required autofocus autocomplete="residence" placeholder="Enter residence" />
            </div>
            <div class="mt-4">
                <x-jet-label for="groupname" value="{{ __('Group Name :') }}" />
                <x-jet-input id="groupname" class="block mt-1 w-full" type="text" name="groupname" required autofocus autocomplete="groupname" placeholder="Enter Group Name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="userId" value="{{ __('UserId :') }}"  hidden/>
                <x-jet-input id="userId" class="block mt-1 w-full" type="text" name="userId" required autofocus autocomplete="userId" placeholder="Enter Group Name" value="{{Auth::user()->email}}" hidden/>
            </div>

            <div class="mt-4">

                <x-jet-label for="description" value="{{ __('Services :') }}" />
                <textarea class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus: ring-opacity-50 ronded-md shadow-sm" style="height:150px" id="description" name="description" placeholder="Enter Service Provided"></textarea>

            </div>
            

            <div class="flex items-center justify-end mt-4" style="padding-right:45% ;">

                <x-jet-button class="ml-4">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        </form>

    </div>
</div>

</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
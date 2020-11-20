@extends('layouts.app', ['activePage' => 'listNotification', 'titlePage' => __('Add Notifications')])


@section('content')

<div class="content">
    @if (count($errors) > 0)
    @if($errors->any())
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{$errors->first()}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
          </div>
 @endif
@endif
</br>


    <div class="container-fluid">
    <div class="card">
        <div class="card-header card-header-text card-header-success text-right">
        <div class="card-text ">
              <h4 class="card-title">Add New Notification</h4>
            </div>
            </div>
            <div class="card-body">
            
            <div class="col-md-12">
                <form method="post" action="{{ route('notification.addNewNotification') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">


                    <!-- <div class="form-group">
                            <label for="exampleFormControlSelect1">Select User</label>
                            <select class="form-control select2" id="user" name="user_id" required>
                                <option value="">Select</option>

                                @foreach ($listUsers as $key=>$b)
                                <option value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Product</label>
                            <select class="form-control select2" id="product" name="product_id" required>
                                <option value="">Select</option>

                                @foreach ($listProducts as $key=>$b)
                                <option value="{{$b->product_id}}">{{$b->product_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- <div class="form-group{{ $errors->has('notification_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Name </label>
                            <br>
                            <input type="text" name="notification_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('notification_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Notifcation Name ') }}" value="{{ old('notification_name') }}" required autofocus>

                        </div>   -->
                        
                         <div class="form-group{{ $errors->has('notification_title') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Title </label>
                            <br>
                            <input type="text" name="notification_title" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('notification_title') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Notification Title ') }}" value="{{ old('notification_title') }}" required autofocus>

                        </div>  
                        
                         <div class="form-group{{ $errors->has('notification_descr') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Description </label>
                            <br>
                            <input type="text" name="notification_descr" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('notification_descr') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Notification Description ') }}" value="{{ old('notification_descr') }}" required autofocus>

                        </div>
                        
                        
                        <div class="text-center">
                            <a href="{{ route('notification.listNotification') }}"  class="btn btn-primary mt-4">{{ __('Back') }}</a>

                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    </br>
</div>

@endsection

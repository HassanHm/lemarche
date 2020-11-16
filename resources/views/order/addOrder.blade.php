@extends('layouts.app', ['activePage' => 'listOrder', 'titlePage' => __('Add Order')])


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
              <h4 class="card-title">Add New Order</h4>
            </div>
            </div>
            <div class="card-body">              
            <div class="col-md-12">
                <form method="post" action="{{ route('order.addNewOrder') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">

                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select User</label>
                            <select class="form-control select2" id="user" name="user_id" required>
                                <option value="">Select</option>

                                @foreach ($users as $key=>$b)
                                <option value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Address</label>
                            <select class="form-control select2" id="address" name="address_id" required>
                                <option value="">Select</option>

                                @foreach ($address as $key=>$b)
                                <option value="{{$b->address_id}}">{{$b->address_city}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('order_number') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Order Number </label>
                            <br>
                            <input type="text" name="order_number" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('order_number') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Order Number ') }}" value="{{ old('order_number') }}" required autofocus>

                        </div>

                        <div class="form-group{{ $errors->has('order_totalprice') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Total Price </label>
                            <br>
                            <input type="number" name="order_totalprice" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('order_totalprice') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Total Price') }}" value="{{ old('order_totalprice') }}" required autofocus>

                        </div>
                        
                        
                        
                        <div class="text-center">
                            <a href="{{ route('order.listOrder') }}"  class="btn btn-primary mt-4">{{ __('Back') }}</a>

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

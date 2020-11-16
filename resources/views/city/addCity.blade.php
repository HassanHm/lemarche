@extends('layouts.app', ['activePage' => 'listCity', 'titlePage' => __('Add City')])


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
              <h4 class="card-title">Add New City</h4>
            </div>
            </div>
            <div class="card-body">             
            <div class="col-md-12">
                <form method="post" action="{{ route('city.addNewCity') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">

                        <div class="form-group{{ $errors->has('city_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Name </label>
                            <br>
                            <input type="text" name="city_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('city_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here City Name ') }}" value="{{ old('city_name') }}" required autofocus>

                        </div>

                        <div class="form-group{{ $errors->has('city_shipping_price') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Delivery Fees </label>
                            <br>
                            <input type="number" name="city_shipping_price" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('city_shipping_price') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Delivery Fees ') }}" value="{{ old('city_shipping_price') }}" required autofocus>

                        </div>
                        
                        
                        <div class="text-center">
                            <a href="{{ route('city.listCity') }}"  class="btn btn-primary mt-4">{{ __('Back') }}</a>

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

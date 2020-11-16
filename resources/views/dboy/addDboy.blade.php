@extends('layouts.app', ['activePage' => 'listDboy', 'titlePage' => __('Add Delivery Boy')])


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
              <h4 class="card-title">Add New Delivery Boy</h4>
            </div>
            </div>
            <div class="card-body">            
            <div class="col-md-12">
                <form method="post" action="{{ route('dboy.addNewDboy') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Name </label>
                            <br>
                            <input type="text" name="name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Delivery Boy Name ') }}" value="{{ old('name') }}" required autofocus>

                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Phone Number </label>
                            <br>
                            <input type="number" name="phone" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Delivery Boy Phone Number ') }}" value="{{ old('phone') }}" required autofocus>

                        </div>
                        
                        
                        <div class="text-center">
                            <a href="{{ route('dboy.listDboy') }}"  class="btn btn-primary mt-4">{{ __('Back') }}</a>

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

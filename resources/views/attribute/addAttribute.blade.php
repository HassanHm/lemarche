@extends('layouts.app', ['activePage' => 'listAttribute', 'titlePage' => __('Add Attribute')])


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
              <h4 class="card-title">Add New Attribute</h4>
            </div>
            </div>
          <div class="card-body">
       
            <div class="col-md-12">
                <form method="post" action="{{ route('attribute.addNewAttribute') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
 
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('attribute_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Attribute Name </label>
                            <br>
                            <input type="text" name="attribute_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('attribute_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Attribute Name ') }}" value="{{ old('attribute_name') }}" required autofocus/>

                        </div>
                        <br/>
                        <div class="form-group{{ $errors->has('attribute_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Values </label>
                            <br>
                            <input type="text" class="form-control tokenfield" name="attribute_values"    required/>

                        </div>

                        <div class="text-center">
                            <a href="{{ route('attribute.listAttribute') }}"  class="btn btn-primary mt-4">{{ __('Back') }}</a>

                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>

    </div>
    </br>
</div>

@endsection

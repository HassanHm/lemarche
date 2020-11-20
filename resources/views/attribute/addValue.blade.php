@extends('layouts.app', [
'class' => '',
'activePage' => 'addValue', 'titlePage' => __('Add Value')])

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
              <h4 class="card-title">Add Value</h4>
            </div>
            </div>
          <div class="card-body">
       

            <div class="col-md-12">
                <form method="post" action="{{ route('attribute.updateValue') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="attribute_id" id="input-id" type="text"   value="{{ old('id', $editAttribute->attribute_id) }}" hidden/>

<h2>Add  {{$editAttribute->attribute_name}} Values :</h2>
                    <div class="pl-lg-4">
                    
                     
                    <div class="form-group{{ $errors->has('attribute_name') ? ' has-danger' : '' }}">
                            <br>
                            <input type="text" class="form-control tokenfield" name="attribute_values"    required/>

                        </div>
                    
                        
                        <div class="text-center">
                            <a href="{{ route('attribute.listAttribute') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

@push('js')
    <script>

    </script>
    @endpush

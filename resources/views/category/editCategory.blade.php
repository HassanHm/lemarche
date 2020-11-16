@extends('layouts.app', [
'class' => '',
'activePage' => 'listCategory', 'titlePage' => __('Edit Category')])

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
    <div class="card-header">

        <div class="row">

            <div class="col-md-12">
                <form method="post" action="{{ route('category.updateCategory') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="category_id" id="input-id" type="text"   value="{{ old('id', $editCategory->category_id) }}" hidden/>

                   
                     
                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('category_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Category Name</label>
                            <input type="text" name="category_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('category_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Category Name') }}" value="{{$editCategory->category_name}}" required autofocus>

                        </div>
                        

                        <div class="text-center">
                            <a href="{{ route('category.listCategory') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

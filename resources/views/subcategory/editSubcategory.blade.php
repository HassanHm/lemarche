@extends('layouts.app', [
'class' => '',
'activePage' => 'listSubcategory', 'titlePage' => __('Edit Subcategory')])

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
                <form method="post" action="{{ route('subcategory.updateSubcategory') }}" autocomplete="off"  enctype="multipart/form-data" >
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="subcategory_id" id="input-id" type="text"   value="{{ old('id', $editSubcategory->subcategory_id) }}" hidden/>

                    <div class="pl-lg-4">
                    
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Category</label>
                            <select class="form-control select2" id="cate" name="category_id" required>
                                <option value="">Select</option>

                                @foreach ($listCat as $key=>$b)
                                <option @if($editSubcategory->category_id ==$b->category_id ) selected @endif value="{{$b->category_id}}">{{$b->category_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group{{ $errors->has('subcategory_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Subcategory Name</label>
                            <input type="text" name="subcategory_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('subcategory_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Subcategory Name') }}" value="{{$editSubcategory->subcategory_name}}" required autofocus>

                        </div>
                        

                        <div class="text-center">
                            <a href="{{ route('subcategory.listSubcategory') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

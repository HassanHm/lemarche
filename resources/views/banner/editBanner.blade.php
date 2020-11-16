@extends('layouts.app', [
'class' => '',
'activePage' => 'listBanner', 'titlePage' => __('Edit Banner')])

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
                <form method="post" action="{{ route('banner.updateBanner') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="banner_id" id="input-id" type="text"   value="{{ old('id', $editBanner->banner_id) }}" hidden/>

                    <div class="pl-lg-4">


                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Product</label>
                            <select class="form-control select2" id="gove" name="product_id" required>
                                <option value="">{{$listProname->product_name}}</option>

                                @foreach ($listProducts as $key=>$b)
                                <option value="{{$b->product_id}}">{{$b->product_name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group{{ $errors->has('banner_url') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Banner URL</label>
                            <input type="text" name="banner_url" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('banner_url') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Banner URL') }}" value="{{$editSubcategory->banner_url}}" required autofocus>

                        </div>
                      
                        

                        <div class="text-center">
                            <a href="{{ route('banner.listBanner') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

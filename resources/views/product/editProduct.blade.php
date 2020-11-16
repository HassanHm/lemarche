@extends('layouts.app', [
'class' => '',
'activePage' => 'listProduct', 'titlePage' => __('Edit Product')])

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
                <form method="post" action="{{ route('product.updateProduct') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="product_id" id="input-id" type="text"   value="{{ old('id', $editProduct->product_id) }}" hidden/>


                    <div class="pl-lg-4">

                        <div class="form-group{{ $errors->has('product_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Product Name</label>
                            <input type="text" name="product_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('product_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Product Name') }}" value="{{$editProduct->product_name}}" required autofocus>

                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Subcategory</label>
                            <select class="form-control select2" id="sub" name="subcategory_id" required>
                                <option value="">Select</option>

                                @foreach ($listSub1 as $key=>$b)
                                <option @if($editProduct->subcategory_id ==$b->subcategory_id ) selected @endif value="{{$b->subcategory_id}}">{{$b->subcategory_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        




                        <div class="form-group{{ $errors->has('product_quantity') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Product Quantity</label>
                            <input type="text" name="product_quantity" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('product_quantity') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Product Quantity') }}" value="{{$editProduct->product_quantity}}" required autofocus>

                        </div> 

                        <div class="form-group{{ $errors->has('product_price') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Product Price</label>
                            <input type="text" name="product_price" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('product_price') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Product Price') }}" value="{{$editProduct->product_price}}" required autofocus>

                        </div>
                        

                        <div class="text-center">
                            <a href="{{ route('product.listProduct') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

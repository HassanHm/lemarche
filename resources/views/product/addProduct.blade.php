@extends('layouts.app', ['activePage' => 'listProduct', 'titlePage' => __('Add Product')])


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
              <h4 class="card-title">Add New Product</h4>
            </div>
            </div>
            <div class="card-body">               
            <div class="col-md-12">
                <form method="post" action="{{ route('product.addNewProduct') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">




                    <label for="id_label_multiple"> Select Values  </label>

  <select class="js-example-basic-multiple js-states form-control select2" id="id_label_multiple" multiple="multiple">
                                
                                @foreach ($listVal as $key=>$b)
                                <option value="{{$b->value_id}}">{{$b->attribute_name}} -- {{$b->value_name}}</option>
                                @endforeach
  </select>


                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Subcategory</label>
                            <select class="form-control select2" id="subcategory" name="subcategory_id"  required>
                                <option value="">Select</option>

                                @foreach ($listSub as $key=>$b)
                                <option value="{{$b->subcategory_id}}">{{$b->subcategory_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('product_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Name </label>
                            <br>
                            <input type="text" name="product_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('product_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Product Name ') }}" value="{{ old('product_name') }}" required autofocus>

                        </div>
                        <div class="form-group{{ $errors->has('product_quantity') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Quantity </label>
                            <br>
                            <input type="number" name="product_quantity" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('product_quantity') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Quantity') }}" value="{{ old('product_quantity') }}" required autofocus>

                        </div>
                        <div class="form-group{{ $errors->has('product_price') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Price </label>
                            <br>
                            <input type="number" name="product_price" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('product_price') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Here Price') }}" value="{{ old('product_price') }}" required autofocus>

                        </div>
                        
                        
                        <div class="text-center">
                            <a href="{{ route('product.listProduct') }}"  class="btn btn-primary mt-4">{{ __('Back') }}</a>

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

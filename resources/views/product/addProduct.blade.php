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



<div class="form-group">
                    <label for="id_label_multiple"> Select Values  </label>

  <select class="js-example-basic-multiple js-states form-control select2" id="id_label_multiple" multiple="multiple">
                                
                                @foreach ($listAttr as $key=>$f)
                                <optgroup label="{{$f->attribute_name}}">
                                @foreach ($listVal as $key=>$b)
                                @if($f->attribute_id == $b->attribute_id )
                                
                                <option value="{{$b->value_id}}">{{$b->value_name}}</option>
                    @endif
                                <!-- <option value="{{$b->value_id}}"> {{$b->value_name}}</option> -->
                                @endforeach
                                </optgroup>
                                @endforeach

  </select>
</div>

<div class="form-group">

  <label for="id_label_multiple"> Select Subcategory </label>

<select class="js-example-basic-multiple js-states form-control select2" id="subcategory" multiple="multiple">
                              
                              @foreach ($listCat as $key=>$f)
                              <optgroup label="{{$f->category_name}}">
                              @foreach ($listSub as $key=>$b)
                              @if($f->category_id == $b->category_id )
                              
                              <option value="{{$b->subcategory_id}}">{{$b->subcategory_name}}</option>
                  @endif
                              @endforeach
                              </optgroup>
                              @endforeach

</select>
</div>


                 
                        <div class="form-group">
                            <label class="form-control-label" for="input-name">Name </label>
                             
                            <input type="text" name="product_name" id="input-name"
                                class="form-control form-control-alternative"
                                placeholder="{{ __('Enter Here Product Name ') }}" value="{{ old('product_name') }}" required >

                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-name">Quantity </label>
                             
                            <input type="number" name="product_quantity" id="input-name"
                                class="form-control form-control-alternative"
                                placeholder="{{ __('Enter Here Quantity') }}" value="{{ old('product_quantity') }}" required >

                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="input-name">Price </label>
                             
                            <input type="number" name="product_price" id="input-name"
                                class="form-control form-control-alternative"
                                placeholder="{{ __('Enter Here Price') }}" value="{{ old('product_price') }}" required >

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
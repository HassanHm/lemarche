@extends('layouts.app', ['activePage' => 'listBanner', 'titlePage' => __('Add Banner')])


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
              <h4 class="card-title">Add New Banner</h4>
            </div>
            </div>
            <div class="card-body">
            
            <div class="col-md-12">
                <form method="post" action="{{ route('banner.addNewBanner') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-4">

                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Product</label>
                            <select class="form-control select2" id="pro" name="product_id" >
                                <option value="">Select</option>

                                @foreach ($listProducts as $key=>$b)
                                <option value="{{$b->product_id}}">{{$b->product_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('banner_url') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Banner URL </label>
                            <input type="text" name="banner_url" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('banner_url') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('ex: http://example.com OR https://example.com') }}" value="{{ old('banner_url') }}"  >

                        </div>
                                            <div class="form-group">
                        <label class="label-control">Expiry Date</label>
                        <input type="text" class="form-control datetimepicker" name="banner_expired_date" placeholder="Enter expiry date" />
                    </div>


                        
                        <div class="text-center">
                            <a href="{{ route('subcategory.listSubcategory') }}"  class="btn btn-primary mt-4">{{ __('Back') }}</a>

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


$('.datetimepicker').datetimepicker({
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
    },
    format : "DD-MM-YYYY"
});
// $lastupdated = date('Y-m-d H:i:s'); dd DD-MM-YYYY YYYY-MM-DD hh:mm:ss     format : {"YYYY-MM-DD"}


    </script>
    @endpush


@extends('layouts.app', [
'class' => '',
'activePage' => 'listCity', 'titlePage' => __('Edit City')])

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
                <form method="post" action="{{ route('city.updateCity') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="city_id" id="input-id" type="text"   value="{{ old('id', $editCity->city_id) }}" hidden/>

                    <div class="pl-lg-4">

                        <div class="form-group{{ $errors->has('city_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">City Name </label>
                            <input type="text" name="city_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('city_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter City Name') }}" value="{{$editCity->city_name}}" required autofocus>

                        </div>

                        <div class="form-group{{ $errors->has('city_shipping_price') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Delivery Fee</label>
                            <input type="number" name="city_shipping_price" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('city_shipping_price') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Delivery Fee') }}" value="{{$editCity->city_shipping_price}}" required autofocus>

                        </div>
                        

                        <div class="text-center">
                            <a href="{{ route('city.listCity') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

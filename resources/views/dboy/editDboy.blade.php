@extends('layouts.app', [
'class' => '',
'activePage' => 'listDboy', 'titlePage' => __('Edit Delivery Boy')])

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
                <form method="post" action="{{ route('dboy.updateDboy') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" id="input-id" type="text"   value="{{ old('id', $editDboy->id) }}" hidden/>

                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Name </label>
                            <input type="text" name="name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Delivery Boy Name') }}" value="{{$editDboy->name}}" required autofocus>

                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Phone Number</label>
                            <input type="number" name="phone" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Phone Number') }}" value="{{$editDboy->phone}}" required autofocus>

                        </div>
                        

                        <div class="text-center">
                            <a href="{{ route('dboy.listDboy') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

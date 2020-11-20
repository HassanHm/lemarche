@extends('layouts.app', [
'class' => '',
'activePage' => 'listNotification', 'titlePage' => __('Edit Notification')])

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
                <form method="post" action="{{ route('notification.updateNotification') }}" autocomplete="off"  enctype="multipart/form-data" >
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="notification_id" id="input-id" type="text"   value="{{ old('id', $editNotification->notification_id) }}" hidden/>

                    <div class="pl-lg-4">
                    
                   
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Product</label>
                            <select class="form-control select2" id="cate1" name="product_id" required>
                                <option value="">Select</option>

                                @foreach ($listProduct as $key=>$b)
                                <option @if($editNotification->product_id ==$b->product_id ) selected @endif value="{{$b->product_id}}">{{$b->product_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group{{ $errors->has('notification_title') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Notification Title</label>
                            <input type="text" name="notification_title" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('notification_title') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Notification Title') }}" value="{{$editNotification->notification_title}}" required autofocus>

                        </div>
                        
                           <div class="form-group{{ $errors->has('notification_descr') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Notification Description</label>
                            <input type="text" name="notification_descr" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('notification_descr') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Notification Description') }}" value="{{$editNotification->notification_descr}}" required autofocus>

                        </div>
                        

                        <div class="text-center">
                            <a href="{{ route('notification.listNotification') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

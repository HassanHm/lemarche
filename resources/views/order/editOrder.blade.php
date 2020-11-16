@extends('layouts.app', [
'class' => '',
'activePage' => 'listOrder', 'titlePage' => __('Edit Order')])

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
                <form method="post" action="{{ route('order.updateOrder') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="order_id" id="input-id" type="text"   value="{{ old('id', $editOrder->order_id) }}" hidden/>


                    <div class="pl-lg-4">




                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Select User</label>
                            <select class="form-control select2" id="user" name="user_id" required>
                                <option value="">Select</option>

                                @foreach ($users as $key=>$b)
                                <option @if ($editOrder->user_id == $b->id) selected @endif  value="{{$b->id}}">{{$b->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Address</label>
                            <select class="form-control select2" id="address" name="address_id" required>
                                <option value="">Select</option>

                                @foreach ($address as $key=>$b)
                                <option @if ($editOrder->address_id == $b->address_id) selected @endif value="{{$b->address_id}}">{{$b->address_city}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group{{ $errors->has('order_number') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Order Number</label>
                            <input type="text" name="order_number" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('order_number') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Order Number') }}" value="{{$editOrder->order_number}}" required autofocus>

                        </div>



                        <div class="form-group{{ $errors->has('order_totalprice') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Order Total Price</label>
                            <input type="text" name="order_totalprice" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('order_totalprice') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Total Price') }}" value="{{$editOrder->order_totalprice}}" required autofocus>

                        </div> 

                       

                        <div class="text-center">
                            <a href="{{ route('order.listOrder') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

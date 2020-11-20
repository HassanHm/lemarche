@extends('layouts.app', [
'class' => '',
'activePage' => 'listAttribute', 'titlePage' => __('Edit Attribute')])

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
              <h4 class="card-title">Edit Attribute</h4>
            </div>
            </div>
          <div class="card-body">
       

            <div class="col-md-12">
                <form method="post" action="{{ route('attribute.updateAttribute') }}" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <input class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="attribute_id" id="input-id" type="text"   value="{{ old('id', $editAttribute->attribute_id) }}" hidden/>


                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('attribute_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Attribute Name</label>
                            <input type="text" name="attribute_name" id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('attribute_name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Enter Attribute Name') }}" value="{{$editAttribute->attribute_name}}" required autofocus>

                        </div>
                        
                     
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Value</label>
                            <select class="form-control select2" id="value_id1" name="value_id" >
                                <option value="">Select</option>

                                @foreach ($listVal as $key=>$b)

                                <option  value="{{$b->value_id}}" >{{$b->value_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="pl-lg-4 values">
                        <div class="form-group{{ $errors->has('value_name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Value Name</label>
                            <input type="text" name="value_name" id="value_name"
                                class="form-control " 
                                placeholder="{{ __('Enter Value Name') }}"   >

                        </div>
                        <input class="form-control" name="value_id" id="value_id" type="text" value=""  hidden/>

                    
                        
                        <div class="text-center">
                            <a href="{{ route('attribute.listAttribute') }}"  class="btn btn-warning mt-4">{{ __('Back') }}</a>

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

// function fillData(){
//     console.log($('#val').val())
   

//     console.log($("#val option:selected").text())
//     $('input_value').val($("#val option:selected").text())

// $('value_id').val($('#val').val())
// }


// $(function() {
//    $('#value_id').on('change', function(){
//        var price = $(this).data('price');
//        $('#value_name').val(price);
//    });
// });

var select = document.getElementById('value_id1');
var input = document.getElementById('value_name');
var id = document.getElementById('value_id');
select.onchange = function() {
    console.log($("#value_id1 option:selected").val())
 if($("#value_id1 option:selected").val() != ''){
     
    input.value = $("#value_id1 option:selected").text();
    id.value =$("#value_id1 option:selected").val();
    $("#value_name").prop('required','required')
 }
 else{
    input.value = ""
    id.value = ""
     $("#value_name").removeAttr("required");
 }

    
}

    </script>
    @endpush

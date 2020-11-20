@extends('layouts.app', ['activePage' => 'listProduct', 'titlePage' => __('Add Image')])


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
              <h4 class="card-title">Add New Image</h4>
            </div>
            </div>
            <div class="card-body">               
            <div class="col-md-12">

            <div class="container-fluid">
      <br />
    <h3 align="center">Drag And Drop File Upload In Laravel 7 Using Dropzone Js</h3>
    <br />
        
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Select Image</h3>
        </div>
        <div class="panel-body">
 
<input type="hidden" id="product_id" name="product_id" value="{{$result['data']}}" />

                  
<form method="post" action="{{url('product.uploadImg')}}" enctype="multipart/form-data" 
                class="dropzone" id="dropzone">
                @csrf
   </form>   
          <!-- <div align="center">
            <button type="button" class="btn btn-info" id="submit-all">Upload</button>
          </div> -->
        </div>
      </div>
      <br />
      <!-- <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Uploaded Image</h3>
        </div>
        <div class="panel-body" id="uploaded_image">
        </div>
      </div> -->
    </div>
 </body>
</html>
@endsection

@push('js')
<script type="text/javascript">
 
$(document).ready(function(){

	var x=document.getElementById("product_id").value ;
        Dropzone.options.dropzone =
         {
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time ;
            },
            dictDefaultMessage:"ارفع الصور"
            ,            uploadMultiple:true,
            addRemoveLinks:true,
            autoProcessQueue:false,
            dictRemoveFile: 'حذف',
         headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            dictRemoveFileConfirmation:'هل انت متأكد من الحذف؟',
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            params: {'car_id':x},
            removedfile : function(file, response) {
             myDropzone = this;
            file.previewElement.remove();

            // $.ajax({
            //     type: 'POST',
            //     url: 'deleteProductsImage',
            //     params:{id: file.name , car_id :{!!$result['data']!!}},
            //     data: {id: file.name , car_id :{!!$result['data']!!}},
            //     dataType: 'html',
            //      success: function(data){
                   
 
            //      },
            //      error:function(data){
                     
            //      }
            // }) 
            },
            success: function(file, response) 
            {
                window.location.href=window.location.href
 
 
            },
            error: function(file, response)
            {
                return false;
            },
            init: function() {
            var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function () {
            myDropzone.processQueue(); // Tell Dropzone to process all queued files.
        });
 
 
 
        this.on('completemultiple', function () {
       
        });
        this.on("complete", function(file) {
                 
}); 
}
}
                 $("#dropzone").sortable({
                     items:'.dz-preview',
    cursor: 'grab',
    opacity: 0.5,
    containment: '#dropzone',
    distance: 20,
    tolerance: 'pointer',
                  stop: function () {
     var imgQ =[]
      $('#dropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {      
         
            var name = el.innerHTML;
                 
             imgQ.push({sort:count,id:name})
            
      });
       $.ajax({
                type: 'POST',
                url: 'sortImages',
                 data:{ data:JSON.stringify({imgQ})}
            }) 
     }, 
                });
            

});

 
</script>
 
@endpush


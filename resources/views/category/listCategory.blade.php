@extends('layouts.app', ['activePage' => 'listCategory', 'titlePage' => __('Categories List')])


@section('content')
</br>
</br>
</br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <h3 class="mb-0">{{ __('Categories') }}</h3>
                                </div>
                                <div class="col-sm-4">
                                <div class="col-md-4 offset-md-4 clearfix">
                                    <a href="{{ route('category.addCategory') }}" class="btn btn-primary btn-lg " role="button">{{ __('Add  Category') }}</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            
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
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('#') }}</th>
                                        <th scope="col">{{ __('Category Name') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($listCategory as $key=>$user)
                                        <tr>
                                            <td>{{ $key+1}} </td>
                                            <td>{{ $user->category_name}} </td>
                                            <td >
                                            
                                            <a href="deleteCategory/{{$user->category_id}}" 
                                            onclick="return confirm('Are you sure you want to delete this Category?')"                                             class="btn btn-danger btn-fab btn-fab-mini btn-round" role="button" aria-disabled="true">
                                             <i class="material-icons">close</i></a>
                                            
                                            <a href="editCategory/{{$user->category_id}}" class="btn btn-success btn-fab btn-fab-mini btn-round" role="button" aria-disabled="true">
                                             <i class="material-icons">edit</i></a>


                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                       
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $listCategory->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>

    </script>
    @endpush
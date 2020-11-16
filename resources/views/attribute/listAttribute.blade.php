@extends('layouts.app', ['activePage' => 'listAttribute', 'titlePage' => __('Attribute List')])


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
                                    <h3 class="mb-0">{{ __('Attributes') }}</h3>
                                </div>
                                <div class="col-sm-4">
                                <div class="col-md-4 offset-md-4 clearfix">
                                    <a href="{{ route('attribute.addAttribute') }}" class="btn btn-primary btn-lg " role="button">{{ __('Add  Attribute') }}</a>
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
                                        <th scope="col">{{ __('Attribute Name') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($listAttribute as $key=>$user)
                                        <tr>
                                            <td>{{ $key+1}} </td>
                                            <td>{{ $user->attribute_name}} </td>
                                            <td >
                                           
                                            <a href="deleteAttribute/{{$user->attribute_id}}" 
                                            onclick="return confirm('Are you sure you want to delete this Attribute?')" 
                                            class="btn btn-danger btn-fab btn-fab-mini btn-round" role="button" aria-disabled="true">
                                             <i class="material-icons">close</i></a>
                                            
                                            <a href="editAttribute/{{$user->attribute_id}}" class="btn btn-success btn-fab btn-fab-mini btn-round" role="button" aria-disabled="true">
                                             <i class="material-icons">edit</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                       
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $listAttribute->links() }}
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
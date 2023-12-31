@extends('admin.admin_master')


@section('admin')

<div class="page-content">
<div class=" stretch-card d-flex justify-content-center mb-7" >
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4">
                            <h6 class="card-title mb-0">Categories</h6>

                            <div class="col-md-4">
                                <a href="{{ route('create-categories') }}">
                                    <button type="button" class="btn btn-primary">Add Category</button>
                                </a>
                            </div>
                            
                        </div>
                        <!-- button -->
                        
                            
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">Edit</th>
                                        <th class="pt-0">Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th scope="row">{{$category->id }}</th>
                                           
                                <span class="h4 ms-3 text-white"></td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{route('edit-categories', $category->id)}}">
                                                    <button type="button" class="btn btn-warning">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                
                                                <form method="POST" action="{{route('delete-categories', $category->id)}}">
                                                    @csrf
                                        
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection
@extends('admin.admin_master')


@section('admin')

<div class="page-content">
<div class=" stretch-card d-flex justify-content-center mb-7" >
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4">
                            <h6 class="card-title mb-0">Users</h6>

                            <div class="col-md-4">
                                <a href="{{ route('create-users') }}">
                                    <button type="button" class="btn btn-primary">Add User</button>
                                </a>
                            </div>
                            
                        </div>
                        <!-- button -->
                        
                            
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">#</th>
                                        <th class="pt-0">Profile</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">Email</th>
                                        <th class="pt-0">Chat</th>
                                        <th class="pt-0">Edit</th>
                                        <th class="pt-0">Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td><img class="wd-100 rounded-circle"
                                    src="{{ !empty($user->image) ? asset('assets/profile_images/' . $user->image) : asset('assets/profile_images/default.png') }}"
                                    alt="profile">
                                <span class="h4 ms-3 text-white"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><a href="{{ route('chatify', $user->id) }}">
                                            <button class="btn btn-success">Chat</button></a></td>
                                            <td>
                                                <a href="{{route('edit-users', $user->id)}}">
                                                    <button type="button" class="btn btn-warning">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('delete.user', $user->id) }}">
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
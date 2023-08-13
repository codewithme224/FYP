@extends('layouts.admin')

@section('employers')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>
                    <a href="{{ route('create.admins') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Admins</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- edit and delete buttons --}}

                            {{-- end of edit and delete buttons --}}
                            @foreach ($admins as $admin)
                                <tr>
                                    <th scope="row">{{ $admin->id }}</th>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <a href="{{route('editadmins-details', $admin->id)}}">
                                            <button type="button" class="btn btn-warning">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('delete-admin', $admin->id) }}">
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
@endsection

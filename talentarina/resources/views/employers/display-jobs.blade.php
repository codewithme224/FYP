@extends('layouts.admin')

@section('employers')

<div class="container-fluid">

    <div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Jobs</h5>
        <a  href="create-jobs.html" class="btn btn-primary mb-4 text-center float-right">Create Jobs</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">job title</th>
              <th scope="col">category</th>
              <th scope="col">company</th>
              <th scope="col">job_region</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($jobs as $job)
            <tr>
              <th scope="row">{{ $job->id }}</th>
              <td>{{ $job->job_title }}</td>
              <td>{{ $job->category }}</td>
              <td>{{ $job->company }}</td>
              <td>{{ $job->job_region }}</td>
              {{-- <td>
                <form method="POST" action="{{ route('delete.jobs', $job->id) }}">
                  @csrf
                  <button type="submit" name="submit" class="btn btn-danger">delete</button>
                </form>
              </td> --}}
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
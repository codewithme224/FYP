@extends('layouts.app')

<style>
  .allcard {
  margin-top: 60px;
  width: 380px;
  height: 440px;
  margin-bottom: 20px;
  border-radius: 20px;
  background: #f5f5f5;
  position: relative;
  padding: 1.8rem;
  border: 2px solid #c3c6ce;
  -webkit-transition: 0.5s ease-out;
  transition: 0.5s ease-out;
  overflow: visible;
}

.card-details {
  color: rgb(162, 0, 255);
  height: 100%;
  gap: .5em;
  display: grid;
  place-content: center;
  font-family: 'Courier New', Courier, monospace;
}

.card-button {
  text-decoration: none;
  text-align: center;
  -webkit-transform: translate(-50%, 125%);
  -ms-transform: translate(-50%, 125%);
  transform: translate(-50%, 125%);
  width: 70%;
  border-radius: 1rem;
  border: none;
  background-color: #E80078;
  color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  position: absolute;
  left: 50%;
  bottom: 0;
  opacity: 0;
  -webkit-transition: 0.3s ease-out;
  transition: 0.3s ease-out;
  cursor: pointer;
  font-family: 'Courier New', Courier, monospace;
}

.card-button:hover {
  background-color: #E80078;
  color: #fff;
}

.text-body {
  color: rgb(134, 134, 134);
}

/*Text*/
.text-title {
  font-size: 1.5em;
  font-weight: bold;
}

/*Hover*/
.allcard:hover {
  border-color: #E80078;
  -webkit-box-shadow: 10px 5px 18px 0 rgba(255, 255, 255, 0.877);
  box-shadow: 10px 5px 18px 0 rgba(255, 255, 255, 0.877);
}

.allcard:hover .card-button {
  -webkit-transform: translate(-50%, 50%);
  -ms-transform: translate(-50%, 50%);
  transform: translate(-50%, 50%);
  opacity: 1;
}

.card-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
  gap: 1rem;
}

@media (min-width: 576px) {
  .card-container {
    grid-template-columns: 1fr auto;
  }
}

@media (min-width: 768px) {
  .card-container {
    grid-template-columns: repeat(3, 1fr);
  }
}

.card-details .job-logo {
  align-items: center;
  display: flex;
  justify-content: center;

}

@media screen and (max-width: 768px) {
  .card-container {
    display: grid;
    grid-template-columns: repeat(1, 1fr);

  }
}
</style>

@section('content')

<section class="card-container">
    @foreach ($jobs as $job)
        <div class="allcard">
            <div class="card-details">
            <img  class="job-logo" src="{{ asset('assets/images/' . $job->image . '') }}" alt="">
                <p class="text-title">{{ $job->job_title }}</p>
                <p class="text-body" >
                    Vacancy: {{ $job->vacancy }}<br>
                    Region: {{ $job->job_region }}<br>
                    Company: {{ $job->company }}<br>
                    Application Deadline: {{ $job->application_deadline}}
                </p>
            </div>
            <a class="card-button" href="{{ route('single.job', $job->id) }}">More info</a>
        </div>
    @endforeach
</section>

@endsection
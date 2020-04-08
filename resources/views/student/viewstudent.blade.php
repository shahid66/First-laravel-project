@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-12  mx-auto">

        <a class="btn btn-success" href="{{route('all.student')}}">All Student</a>
        <hr>

      </div>

         <div class="row">
           <div class="col-md-12">
           
           <h2>{{$show->name}}</h2>
           <h4>{{$show->email}}</h4>
           <h4>{{$show->phone}}</h4>
           
         </div>
         </div>


    </div>
  

@endsection
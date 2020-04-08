@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-12  mx-auto">

        <a class="btn btn-success" href="{{url('allpost')}}">All Post</a>
        <hr>

      </div>

         <div class="row">
           <div class="col-md-12">
           <h2>{{$show->title}}</h2>
           <img src="{{URL::to($show->image)}}" style="width: 500px;height: 300px;">
           <p>{{$show->details}}</p>
         </div>
         </div>


    </div>
  

@endsection
@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">

        <a class="btn btn-danger" href="{{url('/addcatagorie')}}">Add Catagories</a>
        <a class="btn btn-info" href="{{url('/allcatagorie')}}">All Catagories</a>
        <hr>

      </div>

         <div>
           <ol>
            <!-- <li>Catagorie Name: {{$show->id}}</li> -->
             <li>Catagorie Name: {{$show->name}}</li>
             <li>Slug Name: {{$show->slug}}</li>
             <li>Created Time: {{$show->created_at}}</li>
           </ol>
         </div>


    </div>
  

@endsection
@extends('welcome')

@section('content')

<div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">

        <a class="btn btn-danger" href="{{url('/addcatagorie')}}">Add Catagories</a>
        <a class="btn btn-info" href="{{url('/allcatagorie')}}">All Catagories</a>
        <hr>

      </div>

         <table class="table table-responsive">
          
          <tr>
            <td>SL</td>
            <td>Catagorie Name</td>
            <td>Slug</td>
            <td>Action</td>
          </tr>
          @foreach($show as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->slug}}</td>
            <td>
              <a href="{{URL::to('/editecatagorie/'.$row->id)}}" class="btn btn-info">Edit</a>
              <a href="{{URL::to('deletecatagorie/'.$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
              <a href="{{URL::to('viewcatagorie/'.$row->id)}}" class="btn btn-success">View</a>
            </td>
          </tr>
          @endforeach

        </table>


    </div>
  

@endsection
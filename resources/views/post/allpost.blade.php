@extends('welcome')

@section('content2')

<div class="row">
      <div class="col-md-12 mx-auto">

        
        <a class="btn btn-info" href="{{url('/writepost')}}">Write Post</a>
        <hr>



        <table class="table table-responsive">
          
          <tr>
            <td>SL</td>
            <td>Catagorie</td>
            <td>Title</td>
            <td>Image</td>
            <td>Action</td>
          </tr>
          @foreach($show as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->title}}</td>
            <td><img src="{{URL::to($row->image)}}" style="height: 40px; width: 70px;"></td>
            <td>
              <a href="{{URL::to('/editepost/'.$row->id)}}" class="btn btn-info">Edit</a>
              <a href="{{URL::to('/deletepost/'.$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
              <a href="{{URL::to('/viewpost/'.$row->id)}}" class="btn btn-success">View</a>
            </td>
          </tr>
          @endforeach

        </table>

      </div>

         


    </div>
  

@endsection
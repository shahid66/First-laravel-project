@extends('welcome')

@section('content2')

<div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">

        
        <a class="btn btn-info" href="{{url('/student')}}">Add Student</a>
        <hr>

      </div>

         <table class="table table-responsive">
          
          <tr>
            <td>SL</td>
            <td>Students Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Action</td>
          </tr>
          @foreach($stud as $row)
          <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->phone}}</td>
            <td>
              <a href="{{URL::to('/editstudent/'.$row->id)}}" class="btn btn-info">Edit</a>
              <a href="{{URL::to('deletestudent/'.$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
              <a href="{{URL::to('viewstudent/'.$row->id)}}" class="btn btn-success">View</a>
            </td>
          </tr>
          @endforeach

        </table>


    </div>
  

@endsection
@extends('welcome')
@section('content1')

		<div class="col-md-12 mx-auto text-center">
          @foreach($post as $row)
          <img src="{{URL::to($row->image)}}" style="height: 400px;">
          <h3>{{$row->title}}</h3>
          <p>Catagorie:{{$row->name}}</p>
          <hr><br>
          <p>{{$row->details}}</p>
          @endforeach

          {{$post->links()}}
        </div>

@endsection
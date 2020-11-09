
@extends ('layouts.masteradmin')
@section('content')
<br>
<h1 style='color:white;'>Messages</h1><br>
@if(count($messages) > 0)
  @foreach($messages as $message )
   <ul class='list-group'>
      <li style='color:white;background-color:#DF4054;'class='list-group-item'>Name: {{$message->name}}</li>
      <li style='color:white;background-color:#342B38;' class='list-group-item'>Email: {{$message->email}}</li>
     <li style='color:white;background-color:#342B38;'class='list-group-item'>Message: {{$message->message}}</li>
   </ul> <br>
  @endforeach
 @endif

@endsection
<form action="{{route('getForm')}}" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="text" name="name">
	<input type="submit">
</form>
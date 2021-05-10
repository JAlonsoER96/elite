@extends('sistema.template')
@section('titulo')
{{$proceso}}
@endsection
@section('content')

<center><h1>{{$proceso}}</h1>
<br><center>
<b>{{$mensaje}}</b>
</center>
@push('script')
<script >
	function redireccionar(){
		window.location="{{route('clientes')}}";
	}
	setTimeout ("redireccionar()", 4000); //tiempo expresado en milisegundos
</script>
@endpush
@stop

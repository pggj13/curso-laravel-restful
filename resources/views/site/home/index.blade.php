@extends('site.templates.template1')


@section('content')


<h1>home page do site</h1>

{{$xss}}
{{$sidebar}}


@include('site.includes.sidebar',compact('sidebar'))
@endsection


@push('script')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@endpush
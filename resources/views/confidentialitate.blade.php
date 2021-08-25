@extends('parts.template') @section('content')
<div class = "container">
    <div class = "title pasiune-title">{{__('site.confidentialitate')}}</div>
    <div class = "pasiune-text">{!!$text!!}</div>
</div>
@endsection
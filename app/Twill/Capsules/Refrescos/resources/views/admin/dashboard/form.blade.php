@extends('twill::layouts.free')


@section('customPageContent')
  <a17-dashboard :schema='{!! json_encode($schema) !!}' :name='{!! json_encode($name) !!}' :dates='{!! json_encode($dates) !!}' ></a17-dashboard>
@stop

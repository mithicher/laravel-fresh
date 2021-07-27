@extends('errors::custom')

@section('title', __('Forbidden'))
@section('code', '403')
{{-- @section('message', __($exception->getMessage() ?: 'Forbidden')) --}}
@section('message', __('Sorry, you are not authorized to access this page.' ?: 'Forbidden'))

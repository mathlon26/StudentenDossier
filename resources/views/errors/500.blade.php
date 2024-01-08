@extends('components.error-layout')

@section('title', __('Internal Server Error'))
@section('code', __('500'))
@section('error', __('Opps!'))
@section('message', __('An internal server error occurred. Please try again later.'))

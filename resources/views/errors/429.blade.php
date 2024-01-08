@extends('components.error-layout')

@section('title', __('Too Many Requests'))
@section('code', __('429'))
@section('error', __('Opps!'))
@section('message', __('You have exceeded the request limit for this page.'))

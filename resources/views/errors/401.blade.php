@extends('components.error-layout')

@section('title', __('Unauthorized'))
@section('code', __('401'))
@section('error', __('Opps!'))
@section('message', __('You are not authorized to access this page.'))

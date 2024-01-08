@extends('components.error-layout')

@section('title', __('Service Unavailable'))
@section('code', __('503'))
@section('error', __('Opps!'))
@section('message', __('The service is temporarily unavailable. Please try again later.'))

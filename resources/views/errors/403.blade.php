@extends('components.error-layout')

@section('title', __('Forbidden'))
@section('code', __('403'))
@section('error', __('Opps!'))
@section('message', __('You do not have permission to view this page.'))

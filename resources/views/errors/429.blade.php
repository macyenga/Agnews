@extends('errors::custom-layout')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('pageIcon', 'icon-shield')
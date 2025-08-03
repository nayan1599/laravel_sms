@extends('layouts.web')

@section('content')
@include('web_site.banner')
 @include('web_site.section.about')
 @include('web_site.section.student_teacher')
 @include('web_site.section.commitee')
 @include('web_site.section.notice')
 @include('web_site.section.events')

@endsection

{{-- Template Name: Dashboard Template --}}

@extends('layouts.dashboard')

@section('metas')
    <meta name="robots" content="noindex">
@endsection

@section('content')
    @while (have_posts())
        @php the_post() @endphp
    @endwhile
@endsection

@extends('layouts.index')
@section('title', 'File Manager')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div id="fm" style="height: 800px;"></div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection

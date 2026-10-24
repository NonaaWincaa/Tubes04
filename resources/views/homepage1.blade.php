@extends('layouts.app')

@section('title', 'Homepage - Tubes Web')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/mainhomepage.css') }}">
@endpush

@section('content')
    <div class="hero-section">
        <h1>Selamat Datang di Tubes Web</h1>
        <p>Aplikasi kolaborasi dan manajemen tugas berbasis web.</p>
        <a href="{{ route('dashboard') }}" class="btn-primary">Ke Dashboard</a>
    </div>
@endsection
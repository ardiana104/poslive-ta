@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-3">
        @if (session('status'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <span class="alert-icon text-success me-2">
                <i class="ti ti-check ti-xs"></i>
                </span>
                {{ session('status') }}
            </div>
        @endif
    </div>
    @if (Auth::user()->role == 'admin')
        @livewire('admin-home')
    @endif
    @if (Auth::user()->role == 'customer')
        @livewire('customer-home')
    @endif
</div>
@endsection

@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="row">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-info">
                    <div>
                        {{session('success')}}
                    </div>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <livewire:admin.properties/>
            </div>
        </div>

    </main>
@endsection

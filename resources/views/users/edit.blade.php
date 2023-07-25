@extends('layout')
@section('title', 'Edit Pengguna')
@section('user', 'active')
@section('isdash', 0)

@section('css')
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="/assets/css/libs.min.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="/assets/css/hope-ui.min.css?v=2.0.0" />
    <style>
        td {
            text-align: left
        }

        th:hover {
            cursor: pointer;
        }

        #form.table {
            border-color: none;
        }
    </style>
@endsection
@php
    use Carbon\Carbon;
@endphp

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <form method="POST" action="/profile/{{ $id }}" style="font-size: 13px">
                        @csrf
                        <div class="row">
                            {{-- NAMA --}}
                            <div class="form-group">
                                <label for="name" class="form-label">Nama</label>
                                <input class="form-control" id="name" type="text" name="name"
                                    value="{{ $user->name }}" required autofocus autocomplete="name" placeholder="Nama">
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                            </div>
                            {{-- EMAIL --}}
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" id="email" type="email" name="email"
                                    value="{{ $user->email }}" required placeholder="Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>
                            @if (Auth::user()->role == 0)
                                <!-- Password Reset Token -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            aria-describedby="password" required autocomplete="current-password"
                                            placeholder="Password">
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                {{-- CONFIRM --}}
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" type="password"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                </div>
                            @endif
                        </div>
                        <div class="text-end mt-4 mb-4">
                            <button style="border:none;background: #00A7E6;" type="submit" class="btn btn-primary"
                                data-bs-dismiss="modal">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

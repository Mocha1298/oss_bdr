@extends('layout')
@section('title', 'Pengguna Baru')
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
                    <form method="POST" action="/newuser">
                        @csrf
                        <div class="modal-body">
                            {{-- NAMA --}}
                            <div class="form-group">
                                <label for="name" class="form-label">Nama</label>
                                <input class="form-control" id="name" type="text" name="name"
                                    value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama">
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                            </div>
                            {{-- EMAIL --}}
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" id="email" type="email" name="email"
                                    value="{{ old('email') }}" required placeholder="Email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>
                            <div class="text-end mt-4 mb-4">
                                <button style="border:none;background: #00A7E6;" type="submit" class="btn btn-primary"
                                    data-bs-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

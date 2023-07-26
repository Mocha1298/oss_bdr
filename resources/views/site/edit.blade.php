@extends('layout')
@section('title', 'Sites Management')
@section('site', 'active')
@section('isdash', 0)

@php
    use Carbon\Carbon;
@endphp

@section('main')
    <div class="col-sm-12">
        <form action="/sitee/{{ $site->id }}" method="post">
            @csrf
            <div class="form-group">
                <label for="text">Site Name</label>
                <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $site->site_name }}">
            </div>
            <div class="form-group">
                <label for="text">Number Of Levels</label>
                <input type="number" name="approvement_level" id="approvement_level" class="form-control"
                    value="{{ $site->approvement_level }}">
            </div>
            <div class="text-end mt-2">
                <button type="submit" class="btn btn-primary" style="border:none;background: #00A7E6;">Save</button>
            </div>
        </form>
    </div>
@endsection

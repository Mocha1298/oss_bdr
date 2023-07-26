@extends('layout')
@section('title', 'Level Approval')
@section('level', 'active')
@section('isdash', 0)

@php
    use Carbon\Carbon;
@endphp

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="/levele/{{ $level->id }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="text" class="form-label">User</label>
                                <select name="id_user" id="id_user" class="form-control" required
                                    onchange="get_user(this.value);">
                                    <option selected disabled value="">--Pilih User--
                                    </option>
                                    @foreach ($user as $item)
                                        <option @if ($level->id_user == $item->id) selected @endif
                                            value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-end mt-2">
                            <button type="submit" class="btn btn-primary"
                                style="border:none;background: #00A7E6;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

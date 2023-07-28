@extends('layout')
@section('title', 'Daftar Permintaan')
@section('list', 'active')
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
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        new DataTable('#datatable', {
            order: [
                [0, 'desc']
            ]
        });

        function dismiss(id) {
            Swal.fire({
                title: 'Apa Anda yakin untuk menolak permintaan ini?',
                showDenyButton: true,
                confirmButtonText: 'Ya, saya yakin!',
                denyButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/dismiss/' + id
                }
            })
        }
    </script>
@endsection
@php
    use Carbon\Carbon;
@endphp

@section('main')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table mb-0" data-toggle role="grid">
                        <thead>
                            <tr>
                                <th> Dibuat Pada</th>
                                <th> Nama Instansi</th>
                                <th> Jenis Instansi</th>
                                <th> Nama PIC</th>
                                <th> Kontak</th>
                                <th> Email</th>
                                <th> Jumlah Orang</th>
                                <th> Rencana Kunjungan</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oss as $list)
                                @if ($list->total_approval + 1 == $level_user->level)
                                    <tr>
                                        <td>{{ Carbon::parse($list->created_at)->format('D, d M Y') }}</td>
                                        <td>{{ $list->inc_name }}</td>
                                        <td>{{ $list->inc_type }}</td>
                                        <td>{{ $list->pic }}</td>
                                        <td>{{ $list->no_pic }}</td>
                                        <td>{{ $list->email_pic }}</td>
                                        <td>{{ $list->people }}</td>
                                        <td>{{ $list->plan_time }}, {{ $list->plan_date }}</td>
                                        <td></td>
                                        <td>
                                            <a href="#" class="text-success" data-bs-placement="top" title="Approve!"
                                                data-bs-toggle="modal" data-bs-target="#approve{{ $list->id }}">
                                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                            <div class="modal fade" id="approve{{ $list->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <a href="#" class="text-success"
                                                                    data-bs-placement="top" title="Approve!"
                                                                    data-bs-toggle="modal" data-bs-target="">
                                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                                Form Konfirmasi
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <p><strong>Detail Informasi Permintaan:</strong></p>
                                                            <table id="form" class="table">
                                                                <tr>
                                                                    <td>Nama Instansi</td>
                                                                    <td><strong>{{ $list->inc_name }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tipe Instansi</td>
                                                                    <td><strong>{{ $list->inc_type }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>PIC Instansi</td>
                                                                    <td><strong>{{ $list->pic }}
                                                                            ({{ $list->email_pic }})
                                                                        </strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kontak</td>
                                                                    <td><strong>{{ $list->no_pic }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Waktu Kunjungan</td>
                                                                    <td><strong>{{ $list->plan_time }}
                                                                            {{ $list->plan_date }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jumlah Orang</td>
                                                                    <td><strong>{{ $list->people }}</strong></td>
                                                                </tr>
                                                            </table>
                                                            <form action="/approve/{{ $list->id }}" method="post">
                                                                @csrf
                                                                <p><strong>Konfirmasi Jumlah Orang:</strong></p>
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control"
                                                                        id="text" aria-describedby="text"
                                                                        name="people" required
                                                                        value="{{ $list->people }}">
                                                                </div>
                                                                <p><strong>Kode Voucher:</strong></p>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        id="text" aria-describedby="text"
                                                                        name="voucher" required>
                                                                </div>
                                                                <div class="text-end mt-2">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        style="border:none;background: #00A7E6;">Approve</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="text-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Dismiss!"
                                                onclick="dismiss({{ $list->id }})">
                                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <td class="text-center">
                                        @if ($list->people_fix == null)
                                            {{ $list->people }}
                                        @else
                                            {{ $list->people_fix }}
                                        @endif
                                    </td>
                                    <td>{{ $list->plan_time }}
                                        {{ Carbon::parse($list->plan_date)->isoFormat('dddd, D MMMM Y') }}</td>
                                    <td>
                                        @if ($list->status == 0)
                                            <span class="badge rounded-pill text-bg-warning">Pending</span>
                                        @elseif($list->status == 1)
                                            <span class="badge rounded-pill text-bg-success">Approved</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-danger">Dismissed</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($list->status == 0)
                                            <a href="#" class="text-success" data-bs-placement="top" title="Approve!"
                                                data-bs-toggle="modal" data-bs-target="#approve{{ $list->id }}">
                                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                            <div class="modal fade" id="approve{{ $list->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <a href="#" class="text-success"
                                                                    data-bs-placement="top" title="Approve!"
                                                                    data-bs-toggle="modal" data-bs-target="">
                                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                                Form Konfirmasi
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <p><strong>Detail Informasi Permintaan:</strong></p>
                                                            <table id="form" class="table">
                                                                <tr>
                                                                    <td>Nama Instansi</td>
                                                                    <td><strong>{{ $list->inc_name }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tipe Instansi</td>
                                                                    <td><strong>{{ $list->inc_type }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>PIC Instansi</td>
                                                                    <td><strong>{{ $list->pic }}
                                                                            ({{ $list->email_pic }})
                                                                        </strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Kontak</td>
                                                                    <td><strong>{{ $list->no_pic }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Waktu Kunjungan</td>
                                                                    <td><strong>{{ $list->plan_time }}
                                                                            {{ $list->plan_date }}</strong></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jumlah Orang</td>
                                                                    <td><strong>{{ $list->people }}</strong></td>
                                                                </tr>
                                                            </table>
                                                            <form action="/approve/{{ $list->id }}" method="post">
                                                                @csrf
                                                                <p><strong>Konfirmasi Jumlah Orang:</strong></p>
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control"
                                                                        id="text" aria-describedby="text"
                                                                        name="people" required
                                                                        value="{{ $list->people }}">
                                                                </div>
                                                                <p><strong>Kode Voucher:</strong></p>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        id="text" aria-describedby="text"
                                                                        name="voucher" required>
                                                                </div>
                                                                <div class="text-end mt-2">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        style="border:none;background: #00A7E6;">Approve</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="text-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Dismiss!"
                                                onclick="dismiss({{ $list->id }})">
                                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                    </td> --}}

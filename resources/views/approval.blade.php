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
                            @foreach ($oss as $a)
                                @foreach ($apr as $b)
                                    @if ($a->id == $b->id_oss)
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

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

        function approved(id_oss, id_user) {
            Swal.fire({
                title: 'Apa Anda yakin untuk menyetujui permintaan ini?',
                showDenyButton: true,
                confirmButtonText: 'Ya, saya yakin!',
                denyButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/approve/' + id_oss + "/" + id_user
                }
            })
        }

        function cek() {
            const fileInput = document.getElementById('lampiran');
            console.log(fileInput);

            // var input = document.getElementById(id);
            var file = fileInput.files;
            if (file.length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'File belum dipilih!',
                    confirmButtonColor: '#0093ad !important',
                })
                document.getElementById(id).style.borderColor = "red";
            }
            var fileSize = Math.round((file[0].size / 1024));

            if (fileSize >= 10 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ukuran maksimal 10MB!',
                    confirmButtonColor: '#0093ad !important',
                })
                document.getElementById(id).style.borderColor = "red";
                fileInput.value = '';
            } else {
                var filePath = fileInput.value;
                // Allowing file type
                var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.pdf|\.xls|\.xlsx|\.doc|\.docx)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'File yang didukung *jpg,*jpeg,*png,*pdf,*xls,*xlsx,*doc,*docx',
                        confirmButtonColor: '#0093ad !important',
                    })
                    document.getElementById(id).style.borderColor = "red";
                    fileInput.value = '';
                    return false;
                } else {
                    document.getElementById(id).style.borderColor = "#ccc";
                    document.getElementById('submit').disabled = false;
                }
            }
        }

        function showdoc(id) {
            $.ajax({
                type: 'GET',
                url: "/showdoc/" + id,
                beforeSend: function() {
                    swal.fire({
                        html: '<h5>Sedang Memuat Lampiran</h5>',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });
                },
                success: function(e) {
                    Swal.close()
                    lampiran = $('#lampiran');
                    lampiran.empty();
                    $.each(e, function(index, e) {
                        if (e.file.match('pdf')) {
                            nomor = index + 1;
                            button =
                                '<a class="btn btn-sm btn-icon btn-info" href="/showpdf/' + e.id +
                                '">Lampiran ' + nomor + ' </a>'
                            lampiran.append(button);
                        } else {
                            nomor = index + 1;
                            button =
                                '<a class="btn btn-sm btn-icon btn-info" href="/files/' + e.file +
                                '">Lampiran ' + nomor + ' </a>'
                            lampiran.append(button);
                        }
                    })
                }
            });
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
                                <th> Lampiran</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oss as $list)
                                @if ($list->total_approval + 1 >= $level_user->level)
                                    <tr>
                                        <td>{{ $list->created_at }}</td>
                                        <td>{{ $list->inc_name }}</td>
                                        <td>{{ $list->inc_type }}</td>
                                        <td>{{ $list->pic }}</td>
                                        <td>{{ $list->no_pic }}</td>
                                        <td>{{ $list->email_pic }}</td>
                                        <td>{{ $list->people }}</td>
                                        <td>{{ $list->plan_time }}, {{ $list->plan_date }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-icon btn-info" href="#"
                                                onclick="showdoc({{ $list->id }})" data-bs-placement="top"
                                                data-bs-toggle="modal" href="#" data-bs-target="#lampiranmodal">
                                                Lampiran
                                            </a>
                                        </td>
                                        <td>
                                            @if ($list->status == 2)
                                                <span class="badge bg-danger">Rejected</span>
                                            @else
                                                @if ($list->total_approval + 1 == $level_user->level)
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($list->total_approval + 1 > $level_user->level && $list->total_approval != $site->approvement_level)
                                                    <span class="badge bg-success">Waiting Next Approval</span>
                                                @elseif($list->total_approval == $site->approvement_level)
                                                    <span class="badge bg-success">Approved</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($list->status == 2)
                                                <a class="btn btn-sm btn-icon btn-secondary" data-bs-placement="top"
                                                    data-bs-toggle="modal" href="#" style="cursor: default">
                                                    Approve
                                                </a>
                                                <a class="btn btn-sm btn-icon btn-secondary" href="#"
                                                    style="cursor: default">
                                                    Reject
                                                </a>
                                            @else
                                                @if ($list->total_approval + 1 == $level_user->level)
                                                    @if ($level_user->level == $site->approvement_level)
                                                        <a class="btn btn-sm btn-icon btn-success" data-bs-placement="top"
                                                            data-bs-toggle="modal" href="#"
                                                            data-bs-target="#approve{{ $list->id }}">
                                                            Approve
                                                        </a>
                                                        <div class="modal fade" id="approve{{ $list->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            <a href="#" class="text-success"
                                                                                data-bs-placement="top" title="Approve!"
                                                                                data-bs-toggle="modal" data-bs-target="">
                                                                                <svg class="icon-32" width="32"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path fill-rule="evenodd"
                                                                                        clip-rule="evenodd"
                                                                                        d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                    </path>
                                                                                    <path
                                                                                        d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="1.5"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                    </path>
                                                                                </svg>
                                                                            </a>
                                                                            Form Konfirmasi
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-start">
                                                                        <p><strong>Detail Informasi Permintaan:</strong></p>
                                                                        <table id="form" class="table">
                                                                            <tr>
                                                                                <td>Nama Instansi</td>
                                                                                <td><strong>{{ $list->inc_name }}</strong>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tipe Instansi</td>
                                                                                <td><strong>{{ $list->inc_type }}</strong>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>PIC Instansi</td>
                                                                                <td><strong>{{ $list->pic }}
                                                                                        ({{ $list->email_pic }})
                                                                                    </strong></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Kontak</td>
                                                                                <td><strong>{{ $list->no_pic }}</strong>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Waktu Kunjungan</td>
                                                                                <td><strong>{{ $list->plan_time }}
                                                                                        {{ $list->plan_date }}</strong>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jumlah Orang</td>
                                                                                <td><strong>{{ $list->people }}</strong>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <form action="/approve/{{ $list->id }}"
                                                                            method="post" enctype='multipart/form-data'>
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
                                                                            <p><strong>Lampiran:</strong></p>
                                                                            <div class="form-group">
                                                                                <input type="file" class="form-control"
                                                                                    id="lampiran" aria-describedby="text"
                                                                                    name="lampiran" required
                                                                                    onchange="cek()">
                                                                            </div>
                                                                            <div class="text-end mt-2">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"
                                                                                    style="border:none;background: #00A7E6;">Approve</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" href="#"
                                                            onclick="dismiss({{ $list->id }})">
                                                            Reject
                                                        </a>
                                                    @else
                                                        <a class="btn btn-sm btn-icon btn-success" data-bs-placement="top"
                                                            data-bs-toggle="modal" href="#"
                                                            onclick="approved({{ $list->id }},{{ Auth::user()->id }})">
                                                            Approve
                                                        </a>
                                                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" href="#"
                                                            onclick="dismiss({{ $list->id }})">
                                                            Reject
                                                        </a>
                                                    @endif
                                                @else
                                                    <a class="btn btn-sm btn-icon btn-secondary" data-bs-placement="top"
                                                        data-bs-toggle="modal" href="#" style="cursor: default">
                                                        Approve
                                                    </a>
                                                    <a class="btn btn-sm btn-icon btn-secondary" href="#"
                                                        style="cursor: default">
                                                        Reject
                                                    </a>
                                                @endif
                                            @endif
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
    <div class="modal fade" id="lampiranmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lampiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="lampiran"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app') 
 
@section('title', 'Data Dokter - Medikars') 
 
@section('content') 
 
    <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
        <h1 class="h3 mb-0 text-gray-800">Data Dokter</h1> 
 
        <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary"> 
            <span class="fa fa-plus mr-2"></span> 
            <span>Tambah Dokter</span> 
        </a> 
    </div> 
 
    <div class="card"> 
 
        <div class="card-header d-flex align-items-center justify-content-between"> 
            <h5 class="card-title mb-0">Data Dokter</h5> 
        </div> 
 
        <div class="card-body"> 
 
            <table class="table table-striped table-hover datatable"> 
 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama</th> 
                        <th>Spesialisasi</th> 
                        <th>Nomor Telepon</th> 
                        <th>Aksi</th> 
                    </tr> 
                </thead> 
 
                <tbody> 
 
                    @foreach ($dokters as $dokter) 
 
                        <tr> 
 
                            <td> 
                                {{ $loop->iteration }} 
                            </td> 
 
                            <td> 
                                {{ $dokter->nama }} 
                            </td> 
 
                            <td> 
                                {{ $dokter->spesialisasi }} 
                            </td> 
 
                            <td> 
                                {{ $dokter->nomor_telepon }} 
                            </td> 
 
                            <td style="white-space: nowrap;"> 
 
                                {{-- Detail --}} 
                                <a href="{{ route('admin.dokter.show', $dokter->id) }}" 
                                   class="btn btn-info btn-sm"> 
                                    <i class="fas fa-eye"></i> 
                                    Detail 
                                </a> 
 
                                {{-- Edit --}} 
                                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" 
                                   class="btn btn-warning btn-sm"> 
                                    <i class="fas fa-edit"></i> 
                                    Edit 
                                </a> 
 
                                {{-- Hapus --}} 
                                <a href="#" 
                                   onclick="handleDestroy('{{ route('admin.dokter.destroy', $dokter->id) }}'); return false;" 
                                   class="btn btn-danger btn-sm"> 
                                    <i class="fas fa-trash"></i> 
                                    Hapus 
                                </a> 
 
                            </td> 
 
                        </tr> 
 
                    @endforeach 
 
                </tbody> 
 
            </table> 
 
        </div> 
 
    </div> 
 
    {{-- Form tersembunyi untuk proses hapus --}} 
    <form id="form-destroy" method="POST" style="display: none;"> 
        @csrf 
        @method('DELETE') 
    </form> 
 
@endsection 
 
 
@push('styles') 
 
<link rel="stylesheet" 
      href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" /> 
 
@endpush 
 
 
@push('scripts') 
 
<script type="text/javascript" 
        src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"> 
</script> 
 
<script type="text/javascript" 
        src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"> 
</script> 
 
<script type="text/javascript"> 
 
    $('.datatable').dataTable(); 
 
 
    function handleDestroy(url) { 
 
        Swal.fire({ 
 
            title: "Apa kamu yakin ingin menghapus?", 
 
            text: "Kamu tidak bisa mengembalikan data yang sudah dihapus!", 
 
            icon: "warning", 
 
            showCancelButton: true, 
 
            confirmButtonText: "Ya, Hapus!", 
 
            cancelButtonText: "Batal" 
 
        }).then((result) => { 
 
            if (result.isConfirmed) { 
 
                $('#form-destroy').attr('action', url); 
 
                $('#form-destroy').submit(); 
 
            } 
 
        }); 
 
    } 
 
 
    @if (Session::has('success')) 
 
        Swal.fire({ 
 
            title: "Berhasil!!", 
 
            text: "{{ Session::get('success') }}", 
 
            icon: "success", 
 
            draggable: true 
 
        }); 
 
    @endif 
 
</script> 
 
@endpush
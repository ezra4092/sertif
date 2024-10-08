@extends('template.main')
@section('konten')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
   <div class="container-fluid px-4">
      <div class="page-header-content">
         <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
               <h1 class="page-header-title">
                  <div class="page-header-icon"><i data-feather="user"></i></div>
                  Daftar Sertifikat CSR
               </h1>
            </div>
            <div class="col-12 col-xl-auto mb-3">
               {{-- <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
               <i class="me-1" data-feather="users"></i>
               Manage Groups
               </a> --}}
               <a class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahData">
               <i class="me-1" data-feather="user-plus"></i>
               Tambah Data
               </a>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Main page content-->
<div class="container-fluid px-4">
   <div class="card">
      <div class="card-body">
         <table id="datatablesSimple">
            <thead>
               <tr>
                  <th width="2%">No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th width="2%">No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Aksi</th>
               </tr>
            </tfoot>
            <tbody>
               @php $no = 1; @endphp
               @foreach ($data as $user)
               <tr>
                  <td width="2%">{{$no++}}</td>
                  <td>{{$user->nama}}</td>
                  <td>{{$user->username}}</td>
                  <td>
                     <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" id="edit"
                        data-id='{{ $user->id}}'
                        data-nama='{{ $user->nama }}'
                        data-username='{{ $user->username }}'
                        data-password='{{ $user->password }}'data-bs-toggle="modal" data-bs-target="#editModal"><i data-feather="edit"></i></button>
                     <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark"
                        data-bs-toggle="modal" data-bs-target="#hapusModal" id="hapus"
                        data-id='{{ $user->id }}'><i class="fa-solid fa-trash"></i></button>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

         {{-- Modal edit data --}}
         @foreach ($data as $user )
         {{--
         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form class="user" action="{{ url('edit-sertif/'.$user->id_sertif) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id_sertif}}" id="id">
                        <div class="mb-3">
                           <label class="small mb-1" for="nama">Nama</label>
                           <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan nama" value="{{$user->nama}}" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="username">Username</label>
                           <input class="form-control" id="username" name="username" type="text" placeholder="Masukkan username" value="{{$user->username}}" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="password">Password</label>
                           <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password" value="{{$user->password}}" />
                        </div>
                        <!-- Submit button-->
                        <div class="d-flex justify-content-between">
                           <button class="btn btn-primary" type="submit">Edit Data</button>
                           <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         --}}
         @endforeach

         {{-- Modal tambah data --}}
         <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form class="user" action="{{ route('tambah-akun') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                           <label class="small mb-1" for="nama">Nama</label>
                           <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan nama" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="username">Username</label>
                           <input class="form-control" id="username" name="username" type="text" placeholder="Masukkan username" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="password">Password</label>
                           <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password" value="" />
                        </div>
                        <!-- Submit button-->
                        <div class="d-flex justify-content-between">
                           <button class="btn btn-primary" type="submit">Tambah Data</button>
                           <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                        </div>
                     </form>
                  </div>
                  {{--
                  <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
                  --}}
               </div>
            </div>
         </div>

         {{-- Modal hapus data --}}
         <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Delete Data User</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <p>Apakah yakin ingin menghapus data?</p>
                     <form action="{{ route('hapus-akun') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id">
                  </div>
                  <div class="modal-footer"><button class="btn btn-secondary" type="button"
                     data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-danger" type="submit">Delete</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
   $(document).on('click', '#hapus', function(e) {
       var id = $(this).attr("data-id");
       $('#id').val(id);
   });

     $(document).on('click', '#edit', function(e) {
       var id = $(this).attr("data-id");
       var nama = $(this).attr("data-nama");
       var no = $(this).attr("data-no");
       var terbit = $(this).attr("data-terbit");
       var kadaluwarsa = $(this).attr('data-kadaluwarsa');
       var instansi = $(this).attr('data-instansi');
       var jenis = $(this).attr('data-jenis');
       var dokumen = $(this).attr('data-dokumen');
       $('#id_sertif').val(id);
       $('#nama').val(nama);
       $('#username').val(no);
       $('#password').val(terbit);
       $('#tgl_kadaluwarsa').val(kadaluwarsa);
       $('#instansi').val(instansi);
       $('#jenis').val(jenis);
       $('#dokumen').val(dokumen);
   });
</script>
@endsection

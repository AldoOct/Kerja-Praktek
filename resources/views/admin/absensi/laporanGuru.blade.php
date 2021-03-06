@extends('admin.template.base')
@section('content')
<section class="content-header">
      <h1>
        Tabel
        <small>Absensi Guru</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Absensi</li>
      </ol>
</section>
<section class="content">
    <form class="" method="post" action="/absenguru">
    @csrf
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <!-- <div class="col col-sm-1">
                        <label>Tanggal</label>
                    </div>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control" style="width:17%" name="tgl_absen" required>
                    </div> -->
                
            </div>
<!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Status Absen</th>
                    <th>Tanggal/date</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php $nomer = 1; ?>
                @foreach ($users as $guru)
                <tr>
                    <td>{{$nomer}}</td>
                    <td>{{ $guru->nip}}</td>
                    <td>{{ $guru->nama}}</td>
                    <td>{{ $guru->absen}}</td>
                    <td>{{ $guru->tgl_absen}}</td>
                    <td>{{ $guru->keterangan}}</td>
            
                <?php $nomer++; ?>
                </tr>
                @endforeach
                </tfoot>

                </table>
            </div>
<!-- /.box-body -->
            <div class="box-footer">
                <a href="/absenguru/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
        
            </div>
            
        </div>
    </div>
</form>
</section>
@endsection
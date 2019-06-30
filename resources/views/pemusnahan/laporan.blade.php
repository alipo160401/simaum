<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Kwitansi</title>
  </head>
  <body><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
        {{ date('d/m/Y') }}
        </div>
        <div class="col-sm-6" style="font-size: 16px; text-transform: uppercase;">
          umroh ybk
        </div>
      </div><br>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6" style="font-size: 20px; font-weight: bold;">
          KWITANSI
        </div>
        <div class="col-sm-6" style="text-align: right;">
          {{-- Jatuh Tempo: {{ date('d F Y', strtotime($transaksi->jatuh_tempo)) }} --}}
        </div>
        <div style="padding-left:92%;">
            <b>BELUM LUNAS</b>
        </div>
      </div>
    </div><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4" style="font-size: 20px; line-height: 90%;">
          <p>Kepada Yth.</p>
          {{-- <p><b>{{ $transaksi->pelanggan->nama_lengkap }}</b> [{{ $transaksi->pelanggan->tanggal_lahir }}]</p>
          <p>{{ $transaksi->pelanggan->alamat_ktp }}</p>
          <p><b>No.KTP</b> {{ $transaksi->pelanggan->nomor_ktp }}</p>
          <p><b>Telephone</b> {{ $transaksi->pelanggan->no_hp }}</p>
          <p><b>Email</b> {{ $transaksi->pelanggan->email }}</p> --}}
        </div>
        <div class="col-sm-8" style="text-align: right;">
          <img src="/app-assets/images/logo/logo_ybk.png" width="200px" height="100px" alt="pic">
        </div>
      </div>
    </div><br>
    <div class="container-fluid">
      <table style="width:100%;">
        <tr>
          <th style="width:10%;">Nomor Kwitansi</th>
          <th style="width:10%">Paket</th>
          <th style="width:10%">Hari</th>
          <th style="width:10%">Keberangkatan</th>
          <th style="width:20%">Pesawat</th>
          <th style="width:10%">PNR</th>
          <th style="width:10%">Embarkasi</th>
          <th style="width:20%">Hotel</th>
        </tr>
        <tr>
          {{-- <td style="padding-top: 20px;">{{ $transaksi->kwitansi }}</td>
          <td style="padding-top: 20px;">{{ $transaksi->pelanggan->paket->paket }}</td>
          <td style="padding-top: 20px;">{{ $transaksi->pelanggan->paket->program }} hari</td>
          <td style="padding-top: 20px;">{{ date('d F Y', strtotime($transaksi->pelanggan->paket->keberangkatan)) }}</td>
          <td style="padding-top: 20px;">{{ $transaksi->pelanggan->paket->pesawat->jenis_pesawat ?? "" }}, {{ $transaksi->pelanggan->paket->pesawat->keberangkatan ?? "" }} / {{ $transaksi->pelanggan->paket->pesawat->keberangkatan ?? "" }}</td>
          <td style="padding-top: 20px;">VVF9EB</td>
          <td style="padding-top: 20px;">{{ $transaksi->pelanggan->emberkasi_domestik }}</td>
          <td style="padding-top: 20px;">{{ $transaksi->pelanggan->paket->hotel->hotel_madinah ?? "" }} / {{ $transaksi->pelanggan->paket->hotel->hotel_makkah ?? "" }}</td>
        </tr>
      </table><br><br><br>
      <p style="font-size: 20px; text-align: center;"> Lakukan pembayaran sejumlah : </p>
      <p style="text-align: center; font-weight: bold; font-size: 40px; color: orange;">Rp. 5,000,{{ $transaksi->bayar }}</p>
      <p style="font-size: 20px; text-align: center;"> <b>Tepat</b> hingga <b>3 digit terakhir</b> sebelum <b>{{ date('d F Y', strtotime($transaksi->jatuh_tempo)) }}</b> pada jam <b>{{ date('H:i', strtotime($transaksi->jatuh_tempo)) }}</b> Perbedaan nominal dan keterlambatan pembayaran akan menghambat proses verifikasi </p> --}}
    </div>

    <div class="container-fluid">
      <div class="row">
        <div style="font-weight: bold;" class="col-sm-6">
          Harga
        </div>
        <div style="text-align: right;" class="col-sm-6">
          {{-- Rp. {{ number_format((int)$transaksi->pelanggan->paket->harga, 0, ',', '.') }} --}}
        </div>
      </div>
      <br>
      <div class="row">
        <div style="font-weight: bold;" class="col-sm-6">
          Tipe Bayar
        </div>
        <div style="text-align: right;" class="col-sm-6">
          Deposit
        </div>
      </div>
      <br>
      <div class="row">
        <div style="font-weight: bold;" class="col-sm-6">
          Total Bayar
        </div>
        <div style="text-align: right;" class="col-sm-6">
          {{-- Rp. 5,000,{{ $transaksi->bayar }} --}}
        </div>
      </div>
      <br>
      <div class="row">
        <div style="font-weight: bold;" class="col-sm-6">
          Sisa Bayar
        </div>
        <div style="text-align: right;" class="col-sm-6">
          {{-- Rp. {{ number_format((int)$transaksi->pelanggan->paket->harga-5000000, 0, ',', '.') }} --}}
        </div>
      </div>
      <br>
      <div class="col-sm-12">
        <p style="font-weight: bold;">Perhatian : </p>
        <li style="margin-left: 30px;">Booking fee/pelunasan tidak bisa dikembalikan dengan alasan apapun dan hanya berlaku untuk  1 kali keberangkatan</li>
        <li style="margin-left: 30px;">Booking fee/pelunasan berlaku untuk umroh dengan paket yang dipilih</li>
        <li style="margin-left: 30px;">Pembatalan yang dilakukan sepihak oleh calon jamaah menyebabkan booking fee/pelunasan hangus dan tidak ada pengembalian</li>
      </div><br><br>
      <div class="container-fluid">
        <p style="font-size: 30px;">Rekening Perusahaan : </p><br><br>
        <div class="row">
          <div class="col-sm-2">
            <img src="/app-assets/images/gallery/mandiri.jpg" width="200px" height="60px" alt="pic">
          </div>
          <div class="col-sm-10">
            <p style="font-weight: bold;">PT Yuk Bersama KeBaitullah</p>
            <p>No. Rekening 149-0000933939</p>
          </div>
        </div><br><br>
        <p style="margin: 20px;"> <b style="font-size: 20px;"> Copyright &copy 2018 UMROH AMANAH </b> All right reserved.</p>
      </div>
    </div>
  </body>
</html>

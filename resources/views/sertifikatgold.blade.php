<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/sertif.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
</head>

<body>
    <div id="content">
        <div id="A4" class="d-flex">
            <div class="col-3 mh-100 set">
                <table class="table-1" style="height: 100%;">
                    <tbody>
                        <tr>
                            <td class="align-middle text-center text">
                                @if ($produk->scoring_id == 1)
                                    <p class="m-0" style="font-size: 64px; color:#cd7f32;">
                                        Bronze
                                    </p>
                                @elseif($produk->scoring_id == 2)
                                    <p class="m-0" style="font-size: 77px; color: #cccccc">
                                        Silver
                                    </p>
                                @else
                                    <p class="m-0" style="color: #ffd700;font-size: 84px;">
                                        Gold
                                    </p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-9" style="position: relative;">
                <div class="qr">
                    {!! QrCode::backgroundColor(233, 244, 177)->style('round')->size(100)->merge('/public/img/gpci.png')->generate(Request::url()) !!}
                </div>
                <div class="watermark">
                    <img src="{{ asset('img/gpci.png') }}" class="img-watermark">
                </div>
                <img src="{{ asset('img/gli.png') }}" class="center">
                <p class="text-center title">CERTIFICATE of <br> GREEN LABEL INDONESIA</p>
                <p class="text-center teks" style="font-size: 13pt; margin-bottom: 5px;">
                    {{-- ID Kategori Produk --}}
                    GLI - {{ str_pad($produk->kategoriProduk->id, 2, '0', STR_PAD_LEFT) }}
                    {{-- Urutan Produk per Kategori --}}
                    @foreach ($kategori as $item)
                        @foreach ($item->kategoriProduk as $key => $product)
                            @if ($product->id === $produk->id)
                                {{ str_pad($key += 1, 2, '0', STR_PAD_LEFT) }}
                            @endif
                        @endforeach
                    @endforeach
                    {{-- Tanggal Approve --}}
                    {{ \Carbon\Carbon::parse($produk->tgl_approve)->isoFormat('DDMMYY') }}

                    {{-- No Urut Plant per Kategori --}}
                    @foreach ($company as $item)
                        @foreach ($item->factories as $key => $plant)
                            @if ($plant->id === $produk->pabrik->id)
                                {{ str_pad($key += 1, 2, '0', STR_PAD_LEFT) }}
                            @endif
                        @endforeach
                    @endforeach

                    {{-- No Urut Brand per Plant --}}
                    @foreach ($company as $item)
                        @foreach ($item->factories as $plant)
                            @foreach ($plant->produk as $key => $brand)
                                @if ($brand->id === $produk->id)
                                    {{ str_pad($key += 1, 2, '0', STR_PAD_LEFT) }}
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </p>
                <p class="text-center teks" style="font-size: 13pt; margin-bottom: 0;">Awarded to : </p>
                <p class="text-center teks" style="font-size: 20pt; margin-bottom: 8px;">
                    <b>{{ $produk->pabrik->perusahaan->nama_perusahaan }}</b>
                </p>
                <p class="text-center teks" style="font-size: 13pt; margin-bottom: 0;">For The Product Of :</p>
                <p class="text-center teks" style="font-size: 20pt; margin-bottom: 8px;">
                    <b>{{ $produk->nama_produk }}</b>
                </p>
                <p class="text-center teks" style="font-size: 20pt; margin-bottom: 8px;">
                    <b> {{ $produk->kategoriProduk->categories }}</b>
                </p>
                <p class="text-center teks" style="font-size: 12pt; margin-bottom: 0;">Plant Address :</p>
                <p class="text-center teks" style="font-size: 14pt;"><b>{{ $produk->pabrik->alamat_fasilitas }}</b>
                </p>
                <p class="text-center teks" style="font-size: 12pt; margin-bottom: 8px;">Validity :</p>
                <p class="text-center teks" style="font-size: 11pt; margin-bottom: 0;">
                    <b>{{ \Carbon\Carbon::parse($produk->tgl_approve)->locale('id')->isoFormat('dddd, D MMMM Y') .
    ' - ' .
    \Carbon\Carbon::parse($produk->tgl_masa_berlaku)->locale('id')->isoFormat('dddd, D MMMM Y') }}</b>
                </p>

                <div class="signature">
                    <img src="{{ asset('img/ttd.png') }}" class="ttd">
                    <p class="text-center arial" style="font-size: 11pt; margin-bottom: 0;">Hendrata Atmoko</p>
                    <hr style="margin-top: 8px; margin-bottom: 3px;">
                    <p class="text-center arial" style="font-size: 11pt; margin-bottom: 0;">Chairman</p>
                    <p style="font-size: 9pt; margin-bottom: 0; color: #0c2917;" class="arial"><b>GREEN PRODUCT COUNCIL
                            INDONESIA</b></p>
                    <p style="font-size: 9pt; margin-bottom: 0;" class="arial">Jl. Ciputat Raya 27A, Pondok Pindang <br>
                        Kebayoran Lama - Jakarta Selatan 12310</p>
                </div>
                <div class="gen">
                    <img src="{{ asset('img/gen.png') }}" class="gen-img">
                </div>

                <div class="footer">
                    <div class="footer-tabs"></div>
                </div>
            </div>

        </div>
    </div>
    <input type="button" id="print" value="Print Sertifikat!" class="btn btn-success" onclick="printin()" />
    <script>
        function printin() {
            var content = document.getElementById('content').innerHTML;
            var bs = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css";
            var bsjs = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js";
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write('<html><head>');
            a.document.write(
                '<link href=' + bs +
                ' rel="stylesheet"integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" media="screen, print">'
            );
            a.document.write(
                '<scr' + 'ipt type="text/javascript" src=' + bsjs +
                ' integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></scr' +
                'ipt>'
            );
            a.document.write(
                '<style type="text/css" media="screen, print">@page { size: auto;  margin: 0mm; }@font-face{font-family:Georgia;src:url(/fonts/Georgia.ttf)}@font-face{font-family:trajan-pro;src:url(/fonts/trajan-pro.ttf)}body{background:#ccc;-webkit-print-color-adjust: exact !important;}#A4{width:29.7cm;height:21cm;background:#e9f4b1;display:block;margin:0 auto;margin-bottom:.5cm;margin-top:.5cm;box-shadow:0 0 .5cm rgba(0,0,0,.5)}.table-1{position:relative;background-image:linear-gradient(#2d8c52,#0c2917);width:44,1mm}.text{font-family:trajan-pro;color:gold;font-size:84px;transform:rotate(270deg)}img.center{display:block;margin:0 auto;width:39mm;margin-top:25px;margin-bottom:5px}.title{font-family:Georgia;font-size:21pt;margin-bottom:5px;letter-spacing:1px;color:#edbb45}.teks{font-family:trajan-pro}.watermark{margin:0;position:absolute;left:225px;top:250px}.img-watermark{opacity:.2;width:10cm}.footer{position:absolute;bottom:1px;left:-3%}.footer-tabs{width:23cm;height:10.25mm;background-image:linear-gradient(to right,#0e2e1a,#0e2e1a,rgba(14,46,26,0))}.signature{position:absolute;bottom:6%;width:7cm}.ttd{width:55mm}.gen{position:absolute;bottom:6%;right:-10%;width:6cm}.gen-img{width:34mm}.arial{font-family:Arial}.qr{position:absolute;right:30px;top:30px}</style>'
            );
            a.document.write('</head><body >');
            a.document.write('<body>');
            a.document.write(content);
            a.document.write('</body></html>');
            a.document.close();
            a.moveTo(0, 0);
            a.resizeTo(screen.width, screen.height);
            setTimeout(function() {
                a.print();
                a.close();
            }, 1000);
            // a.print();
        }

    </script>
</body>

</html>

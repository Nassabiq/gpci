<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Palanquin:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>Email</title>
</head>

<body style="margin: 0 auto; padding: 0; font-family: 'Palanquin', sans-serif;">
    <table style="border: 1px solid #cccccc; border-collapse: collapse; width: 600px;
            margin: 0 auto;">
        <tr
            style="background-image: url({{ $message->embed('img/gg.jpg') }}); padding: 40px 0 0 0; text-align: center;">
            <td>
                <table style="width: 100%; border-collapse: collapse;
            margin: 0 auto;">
                    <tr style="text-align: center;">
                        <td style="padding: 5px;">
                            <img src="{{ $message->embed('img/GPCI-logo.png') }}" alt="" width="100" height="100">
                        </td>
                        <td style="padding: 5px;">
                            <p style="font-size: 30px; font-weight: 600; margin: 0; padding-top: 20px;">Green Product
                                Council Indonesia</p>
                            <p style="font-weight: 400; margin: 0; padding-bottom: 30px;">Thank you for submitting your
                                application form</p>
                        </td>
                        <td style="padding: 5px;">
                            <img src="{{ $message->embed('img/gen.png') }}" alt="" width="100" height="100">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="text-align: center;">
            <td style="background-color: #ffffff; padding: 5px;">
                <table style="width: 100%; border-collapse: collapse;
            margin: 0 auto;">
                    <tr style="text-align: center;">
                        <td style="padding: 20px;">
                            Terima kasih atas pendaftarannya dari {{ $nama_perusahaan }}. Formulir pendaftaran
                            sertifikasi
                            Green Label Indonesia (GLI) telah kami terima dengan baik.
                        </td>
                    </tr>
                    <tr style="text-align: center;">
                        <td style="padding: 5px 20px 5px 20px;">
                            Selanjutnya adalah input checklist dokumen, mohon dipersiapkan copy dokumen pelengkap sesuai
                            checklist tersebut dan di-input kembali pada Sistem sertifikasi Green Label Indonesia.
                            <p>
                                Demikian informasi dari kami. Terima kasih atas perhatiannya.
                            </p>
                        </td>
                    </tr>
                    <tr style="text-align: center;">
                        <td style="padding: 0 20px 20px 20px;">
                            Salam, <br>
                            <b>
                                GREEN PRODUCT COUNCIL INDONESIA
                            </b>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="text-align: center;">
            <td style="background-color: #42a2da;">
                <table style="width: 100%; border-collapse: collapse;
            margin: 0 auto;">
                    <tr style="display: flex; justify-content: space-around;">
                        <td style="display: flex; padding: 5px; text-align: center;">
                            <img src="https://img.icons8.com/wired/64/000000/ringing-phone.png"
                                style="width: 30px; height: 30px;" />
                            <p style="margin: 0 0 0 5px;">021 - 7509476</p>
                        </td>
                        <td style="display: flex; padding: 5px;">
                            <img src="https://img.icons8.com/offices/30/000000/whatsapp.png"
                                style="width: 30px; height: 30px;" />
                            <p style="margin: 0 0 0 5px;">+62 812-1293-7770</p>
                        </td>
                        <td style="display: flex; padding: 5px;">
                            <img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"
                                style="width: 30px; height: 30px;" />
                            <p style="margin: 0 0 0 5px;">gpcindonesia</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- {{ $nama_perusahaan }}, Berhasil --}}
</body>

</html>

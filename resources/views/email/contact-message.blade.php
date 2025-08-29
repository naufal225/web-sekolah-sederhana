<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0 0 8px 8px;
        }

        .field {
            margin-bottom: 15px;
        }

        .field strong {
            color: #4CAF50;
            display: inline-block;
            width: 100px;
        }

        .message-content {
            background-color: white;
            padding: 15px;
            border-left: 4px solid #4CAF50;
            margin: 10px 0;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Pesan Kontak Baru</h2>
        <p>SMK Telekomunikasi Telesandi Bekasi</p>
    </div>

    <div class="content">
        <div class="field">
            <strong>Nama:</strong> {{ $contactMessage->name }}
        </div>

        <div class="field">
            <strong>Email:</strong> {{ $contactMessage->email }}
        </div>

        <div class="field">
            <strong>Subjek:</strong> {{ $contactMessage->subject }}
        </div>

        <div class="field">
            <strong>Pesan:</strong>
            <div class="message-content">
                {!! nl2br(e($contactMessage->message)) !!}
            </div>
        </div>

        <div class="field">
            <strong>Dikirim pada:</strong> {{ $contactMessage->created_at->format('d/m/Y H:i:s') }}
        </div>
    </div>

    <div class="footer">
        <p>Email ini dikirim otomatis dari sistem website SMK Telekomunikasi Telesandi Bekasi</p>
    </div>
</body>

</html>
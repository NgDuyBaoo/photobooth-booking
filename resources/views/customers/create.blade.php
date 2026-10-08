<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information - Ngói Photobooth</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F7F1E7;
            color: #332A24;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: #FFFDF8;
            width: 100%;
            max-width: 420px;
            padding: 35px 28px;
            border-radius: 18px;
            box-shadow: 0 8px 30px #6B4F3A18;
        }

        .logo {
            text-align: center;
            color: #6B4F3A;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .brand {
            text-align: center;
            letter-spacing: 4px;
            font-size: 11px;
            color: #7D7168;
        }

        h2 {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #7D7168;
            font-size: 14px;
            margin-bottom: 35px;
        }

        label {
            display: block;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 1px solid #D8CABB;
            border-radius: 10px;
            background: white;
            font-size: 15px;
            margin-bottom: 22px;
        }

        input:focus {
            outline: none;
            border-color: #6B4F3A;
        }

        button {
            width: 100%;
            padding: 16px;
            background: #6B4F3A;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #503A2B;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #E6F2E6;
            color: #27632A;
        }

        .error {
            color: #B85450;
            font-size: 13px;
            margin-top: -15px;
            margin-bottom: 18px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #7D7168;
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">NGÓI</div>
        <div class="brand">PHOTOBOOTH</div>

        <h2>Chào mừng bạn đến với Ngói</h2>
        <p class="subtitle">
            Nhập thông tin dưới đây để tiếp tục.
        </p>

        @if(session('success'))
            <div class="message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <label for="name">Tên của bạn</label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Tên của bạn"
                value="{{ old('name') }}"
                required
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="phone">Số điện thoại</label>
            <input
                type="tel"
                id="phone"
                name="phone"
                placeholder="Nhập số điện thoại"
                value="{{ old('phone') }}"
                maxlength="10"
                required
            >

            @error('phone')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">
                Tiếp tục →
            </button>
        </form>

        <p class="footer">
            Thông tin của bạn được bảo mật.
        </p>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn gói chụp - Ngói Photobooth</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F7F1E7;
            color: #332A24;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        h1 { color: #6B4F3A; }

        .packages {
            display: grid;
            grid-template-columns: repeat(
                auto-fit, minmax(230px, 1fr)
            );
            gap: 20px;
            margin-top: 35px;
        }

        .card {
            background: #FFFDF8;
            padding: 30px 20px;
            border-radius: 16px;
            border: 1px solid #D8CABB;
        }

        .price {
            font-size: 25px;
            font-weight: bold;
            color: #6B4F3A;
            margin: 20px 0;
        }

        .button {
            display: block;
            background: #6B4F3A;
            color: white;
            padding: 14px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .button:hover {
            background: #503A2B;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>NGÓI PHOTOBOOTH</h1>
        <h2>Chọn gói chụp của bạn</h2>
        <p>Hãy lựa chọn gói chụp phù hợp với bạn nhé!</p>

        <div class="packages">
            @forelse($packages as $package)
                <div class="card">
                    <h2>{{ $package->name }}</h2>

                    <p>{{ $package->description }}</p>

                    <div class="price">
                        {{ number_format($package->price, 0, ',', '.') }}đ
                    </div>

                    <a href="{{ route('packages.select', $package->id) }}"
                       class="button">
                        CHỌN GÓI →
                    </a>
                </div>
            @empty
                <p>Hiện chưa có gói chụp nào.</p>
            @endforelse
        </div>
    </div>
</body>
</html>

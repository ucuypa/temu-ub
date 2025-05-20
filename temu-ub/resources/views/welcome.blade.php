<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Temu UB - Universitas Brawijaya</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .onboarding-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4rem;
            min-height: 80vh;
        }

        .left-section {
            max-width: 40%;
        }

        .left-section p.title {
            font-weight: bold;
        }

        .left-section h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .left-section p.description {
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.5;
            color: #333;
        }

        .btn-continue {
            background-color: #1e232b;
            color: #fff;
            padding: 1rem 2rem;
            font-size: 1.5rem;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            width: 100%;
        }

        .right-section {
            position: relative;
            max-width: 50%;
        }

        .logo {
            max-width: 800px;
            display: block;
            margin: 0 auto;
        }

        .green-shape {
            position: absolute;
            background-color: #b7deb4;
            width: 150px;
            height: 150px;
        }

        .top-right {
            top: 0;
            right: 70px;
            border-top-left-radius: 100%;
        }

        .bottom-left {
            bottom: 0;
            left: 100px;
            border-bottom-right-radius: 100%;
        }

        @media (max-width: 768px) {
            .onboarding-container {
                flex-direction: column;
                text-align: center;
                padding: 2rem;
            }

            .left-section,
            .right-section {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="onboarding-container">
        <div class="left-section">
            <p class="title">Universitas Brawijaya</p>
            <h1>Temu<br>UB</h1>
            <p class="description">Temu UB adalah sistem manajemen kehilangan dan penemuan barang untuk mahasiswa Universitas Brawijaya.</p>
            <a href="{{ route('login') }}" class="btn-continue">Continue</a>
        </div>
        <div class="right-section">
            <img src="{{ asset('images/logo-ub.png') }}" alt="UB Logo" class="logo">
            <div class="green-shape top-right"></div>
            <div class="green-shape bottom-left"></div>
        </div>
    </div>
</body>

</html>
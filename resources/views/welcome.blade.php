<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selamat Datang di SAKURA!</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      background: linear-gradient(to right, #a8e6cf, #81c784);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-align: center;
    }

    h1 {
      font-size: 3em;
      margin-bottom: 10px;
      color: #ffffff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    #changing-text {
      font-size: 1.8em;
      height: 50px;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }

    .description {
      font-size: 1.2em;
      background: rgba(0, 0, 0, 0.2);
      padding: 20px;
      border-radius: 10px;
      max-width: 600px;
      margin-top: 20px;
    }

    .login-btn {
      margin-top: 30px;
      padding: 12px 30px;
      background-color: #388e3c;
      border: none;
      border-radius: 8px;
      font-size: 1.1em;
      color: #fff;
      cursor: pointer;
      text-decoration: none;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
      transition: background 0.3s ease;
    }

    .login-btn:hover {
      background-color: #2e7d32;
    }

    footer {
      position: absolute;
      bottom: 20px;
      font-size: 0.9em;
      color: #e8f5e9;
    }
  </style>
</head>
<body>
  <h1>Selamat Datang di <strong>SAKURA!</strong></h1>
  <div id="changing-text">Sistem Administrasi Kesehatan Unggulan</div>

  <div class="description">
    SAKURA (Sistem Administrasi Kesehatan UKS Ramah dan Aktif) membantu mendata rekam medis siswa, kunjungan UKS, dan laporan kesehatan sekolah secara digital dan terintegrasi.
  </div>

  <a href="{{ route('login') }}" class="login-btn">Login</a>

  <footer>© 2025 SMK Assalaam | SAKURA v1.0</footer>

  <script>
    const messages = [
      "Sistem Administrasi Kesehatan Unggulan",
      "Pantau Kesehatan Siswa Lebih Mudah",
      "Digitalisasi Layanan UKS Sekolah",
      "Rekam Medis dan Obat Tersimpan Rapi",
      "Selamat Datang di Era UKS Modern"
    ];

    let i = 0;
    const changingText = document.getElementById("changing-text");

    function showNextText() {
      changingText.style.opacity = 0;

      setTimeout(() => {
        changingText.textContent = messages[i];
        changingText.style.opacity = 1;
        i = (i + 1) % messages.length;
      }, 1000);
    }

    showNextText(); // initial
    setInterval(showNextText, 4000); // change every 4s
  </script>
</body>
</html>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Prediksi Naive Bayes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        footer {
            margin-top: auto;
        }
    </style>
  </head>
  <body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
      <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">Prediksi Cafe</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                <?php if(session()->get('isLoggedIn')): ?>
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('prediction') ?>">Form Prediksi</a>
                    </li>
                    
                    <li class="nav-item ms-3">
                        <a class="btn btn-danger btn-sm mt-1" href="<?= base_url('logout') ?>">
                            Logout (<?= session()->get('username') ?>)
                        </a>
                    </li>

                <?php else: ?>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="<?= base_url('login') ?>">Login</a>
                    </li>

                <?php endif; ?>
                </ul>
        </div>
      </div>
    </nav>
    <?= $this->renderSection('content'); ?>

    <footer class="bg-white text-center py-3 mt-5 border-top">
        <div class="container">
            <small class="text-muted">Copyright &copy; <?= date('Y') ?> - Sistem Prediksi Penjualan Cafe</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <p>Welcome <?= $this->session->userdata('user_id') ?></p>
                        <a href="<?= base_url('login/logout') ?>" class="btn btn-primary">Logout</a>
                    </div

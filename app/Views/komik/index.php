<?= $this->extend('layout/template'); ?>

<?= $this->section('blockBody'); ?>

<div class="container">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Komik</li>
        </ol>
    </nav>
    <h1>Comics List</h1>
    <div class="row">

        <?php foreach ($komik as $k) : ?>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100">

                    <img class="card-img-top h-75" src=" <?= $k['sampul']; ?>" alt="Card image cap">
                    <a href="/komik/<?= $k['slug']; ?>">
                        <div class="card-body">
                            <p class="card-text"><?= $k['judul']; ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>



</div>
<?= $this->endSection(); ?>
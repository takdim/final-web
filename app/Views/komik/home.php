<?= $this->extend('layout/template'); ?>

<?= $this->section('blockBody'); ?>
<div class="container">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $i = 0
            ?>
            <?php foreach ($komik as $k) : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?= $i == 0 ? "active" : ""; ?>"></li>
            <?php endforeach; ?>

        </ol>

        <div class="carousel-inner">
            <?php
            $i = 0
            ?>
            <?php foreach ($komik as $c) : ?>

                <div class="carousel-item <?= $i == 0 ? "active" : ""; ?>">
                    <?php $i++ ?>
                    <a href="/komik/<?= $c['slug']; ?>">
                        <img class="d-block w-100" src="<?= $c['bgPicture']; ?>" alt="...">

                    </a>
                </div>
            <?php endforeach ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<br>

<div class="container">
    <div class="container shadow bg-white">

        <h4 class="text-black">Last Update</h4>

        <?php foreach ($komik as $c) : ?>
            <a href="/komik/<?= $c['slug']; ?>">

                <div class="card mb-3" style="max-width: 100%;" id="post">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= $c['sampul']; ?>" class="card-img" id="img-home" alt="..." style="width: 100%; height: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $c['judul']; ?></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated <?= $c['updated_at']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach ?>

    </div>
</div>

<?= $this->endSection(); ?>
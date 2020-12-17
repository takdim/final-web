<?= $this->extend('layout/template'); ?>

<?= $this->section('blockBody'); ?>
<div class="container">
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/komik">Komik</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $komik['slug']; ?></li>
        </ol>
    </nav>
    <img src="<?= $komik['bgPicture']; ?>" alt="" id="cover">

    <div class="container">
        <div class="container" id="post">
            <div class="row">
                <img src="<?= $komik['sampul']; ?>" id="img" alt="" style="border-style: solid; border-color: white;">
                <div class="col">
                    <h4><?= $komik['judul']; ?></h4>
                    <div class="row">

                        <ul>
                            <li>
                                <p>Penulis: <?= $komik['penulis']; ?></p>
                            </li>
                            <li>
                                <p>Penerbit: <?= $komik['penerbit']; ?></p>
                            </li>
                            <li>
                                <p>Sinopsis: <?= $komik['sinopsis']; ?></p>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>


        </div>
    </div>


</div>
<?= $this->endSection(); ?>
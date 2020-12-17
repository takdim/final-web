<?= $this->extend('layout/adminTemplate'); ?>

<?= $this->section('blockBody'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= $komik['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p><?= $komik['penulis']; ?></p>
                            <p><?= $komik['penerbit']; ?></p>
                            <p><?= $komik['sinopsis']; ?></p>

                            <form action="/admin/<?= $komik['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>

                            <a href="/admin/edit/<?= $komik['slug']; ?>" class="btn btn-warning">edit</a>
                            <a href="/admin/komik" class="btn btn-info">back to comic</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
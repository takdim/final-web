<?= $this->extend('layout/template'); ?>

<?= $this->section('blockBody'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">cover</th>
                        <th scope="col">title</th>
                        <th scope="col">detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($komik as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td>
                                <img src="<?= $k['sampul']; ?>" alt="">
                            </td>
                            <td><?= $k['judul']; ?></td>
                            <td>
                                <a href="/komik/<?= $k['slug']; ?>" class="btn btn-success">detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
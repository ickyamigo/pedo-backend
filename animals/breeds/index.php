<?php include($_SERVER['DOCUMENT_ROOT'] . '/template/header.inc.php') ?>
<?php

use Models\AnimalBreed;

$total = AnimalBreed::count(); // Total of records
$current_page = $_GET['page'] ?? 1; // Page indicator
$per_page = 10; // Limit per page
$offset = ($current_page - 1) * $per_page; // Skip records
$last_page = ceil($total / $per_page); // Total page

// Previous page link
if ($current_page < 2) {
    $prev_page_url = null;
} else {
    $prev_page_url = 'animals/breeds/index.php?page=' .  ($current_page - 1);
    if (isset($_GET['search'])) {
        $prev_page_url .= '&search=' . urlencode($_GET['search']);
    }
    $prev_page_url = base_url($prev_page_url);
}

if ($current_page == $last_page) {
    $next_page_url = null;
} else {
    $next_page_url = 'animals/breeds/index.php?page=' . ($current_page + 1);
    if (isset($_GET['search'])) {
        $next_page_url .= '&search=' . urlencode($_GET['search']);
    }
    $next_page_url = base_url($next_page_url);
}


$animal = AnimalBreed::with(['animalType'])->when(isset($_GET['search']), function ($query) {
    $query->where('title', 'like', '%' . $_GET['search'] . '%');
})
    ->offset($offset)
    ->limit($per_page)
    ->orderBy('id', 'DESC');

$data = [
    'current_page' => $current_page,
    'data' => $animal->get(),
    'form' => $offset + 1,
    'next_page_url' => $next_page_url,
    'per_page' => $per_page,
    'prev_page_url' => $prev_page_url,
    'to' => $offset + $per_page,
];

?>

<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/template/message.inc.php') ?>
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Data Ras Hewan</h5>
                                <form action="<?= base_url('animals/breeds/index.php') ?>">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="search" placeholder="Masukkan Ras Hewan" value="<?= !isset($_GET['search']) ? "" : $_GET['search'] ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" id="basic-addon2">Cari</button>
                                        </div>
                                    </div>
                                </form>
                                <a href="<?= base_url('animals/breeds/tambah.php') ?>" class="btn btn-primary">Tambah</a>
                            </div>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ras Hewan</th>
                                        <th>Tipe Hewan</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($data['data']->count() > 0) : ?>
                                        <?php foreach ($data['data'] as $breed) : ?>
                                            <tr>
                                                <td><?= $breed->id ?></td>
                                                <td><?= $breed->title ?></td>
                                                <td><?= $breed->animalType->title ?></td>
                                                <td><?= $breed->created_at ?></td>
                                                <td>
                                                    <a href="<?= base_url('animals/breeds/edit.php?id=' . $breed->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="<?= base_url('animals/breeds/hapus.php') ?>" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus?')">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="id" value="<?= $breed->id ?>">
                                                        <button class="btn btn-danger"> Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php if (!is_null($data['prev_page_url'])) : ?>
                                        <li class="page-item"><a class="page-link" href="<?= $data['prev_page_url'] ?>">Previous</a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (count($data['data']) > 1 && !is_null($data['next_page_url'])) : ?>
                                        <li class="page-item"><a class="page-link" href="<?= $data['next_page_url'] ?>">Next</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/template/footer.inc.php') ?>
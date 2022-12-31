<div class="lime-sidebar">
    <div class="lime-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Navigasi
            </li>
            <li>
                <a href="<?= base_url('home.php') ?>"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>
            <li class="sidebar-title">
                Fitur
            </li>
            <li>
                <a href=""><i class="material-icons">apps</i>Master<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('admin') ?>"><i class="material-icons">person_outline</i>Master Admin</a>
                    </li>
                    <li>
                        <a href="<?= base_url('users') ?>"><i class="material-icons">person_outline</i>Master User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=""><i class="material-icons">apps</i>Data Hewan<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('animals/types') ?>">Tipe Hewan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('animals/breeds') ?>">Ras Hewan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('animals') ?>">Hewan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=""><i class="material-icons">code</i>Artikel<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('articles') ?>">Artikel</a>
                    </li>
                    <li>
                        <a href="<?= base_url('articles/categories') ?>">Kategori Artikel</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('users/upgrade') ?>"><i class="material-icons">bar_chart</i>Permintaan Mitra</a>
            </li>
            <li>
                <a href="<?= base_url('animals/request') ?>"><i class="material-icons">input</i>Permintaan Hewan</a>
            </li>
            <li class="sidebar-title">
                Lainnya
            </li>
            <li>
                <a href=""><i class="material-icons">star_border</i>Pages<i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('faq') ?>">Frequently Asked Questions</a>
                    </li>
                    <li>
                        <a href="<?= base_url('report') ?>">Report</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
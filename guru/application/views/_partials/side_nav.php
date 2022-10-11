<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <ul class="nav menu">
    <li role="presentation" class="divider"></li>
    <li class="<?= $current_page == 'home' ? 'active' : ''; ?>">
      <a href="<?= base_url(); ?>">
        <svg class="glyph stroked dashboard-dial">
          <use xlink:href="#stroked-dashboard-dial"></use>
        </svg> Beranda
      </a>
    </li>
    <li class="parent <?= $current_page == 'tahun_ajar' ? 'active' : ''; ?>">
      <a href="<?= base_url('tahun_ajar'); ?>">
        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down">
            <use xlink:href="#stroked-chevron-down"></use>
          </svg></span> Manajemen Tahun Ajar
      </a>
      <ul class="children collapse <?= $current_page == 'tahun_ajar' || $current_page == 'rapor' || $current_page == 'leger'
                                      || $current_page == 'tahun_peringkat' || $current_page == 'tahun_kenaikan'
                                      || $current_page == 'tahun_peran' || $current_page == 'tahun_mapel' || $current_page == 'siswa'
                                      ? 'in' : ''; ?>" id="sub-item-1">
        <li class="<?= $current_page == 'rapot' ? 'active' : ''; ?>">
          <a class="" href="<?= base_url('rapor'); ?>">
            <svg class="glyph stroked chevron-right">
              <use xlink:href="#stroked-chevron-right"></use>
            </svg> Manajemen Rapor
          </a>
        </li>
        <li class="<?= $current_page == 'leger' ? 'active' : ''; ?>">
          <a class="" href="<?= base_url('leger'); ?>">
            <svg class="glyph stroked chevron-right">
              <use xlink:href="#stroked-chevron-right"></use>
            </svg> Manajemen Leger
          </a>
        </li>
        <li class="<?= $current_page == 'tahun_peringkat' ? 'active' : ''; ?>">
          <a class="" href="<?= base_url('tahun_peringkat'); ?>">
            <svg class="glyph stroked chevron-right">
              <use xlink:href="#stroked-chevron-right"></use>
            </svg> Manajemen Peringkat
          </a>
        </li>
        <li class="<?= $current_page == 'tahun_kenaikan' ? 'active' : ''; ?>">
          <a class="" href="<?= base_url('tahun_kenaikan'); ?>">
            <svg class="glyph stroked chevron-right">
              <use xlink:href="#stroked-chevron-right"></use>
            </svg> Manajemen Kenaikan
          </a>
        </li>
        <li class="<?= $current_page == 'tahun_peran' ? 'active' : ''; ?>">
          <a class="" href="<?= base_url('tahun_peran'); ?>">
            <svg class="glyph stroked chevron-right">
              <use xlink:href="#stroked-chevron-right"></use>
            </svg> Manajemen Peran Guru
          </a>
        </li>
        <li class="<?= $current_page == 'tahun_mapel' ? 'active' : ''; ?>">
          <a class="" href="<?= base_url('tahun_mapel'); ?>">
            <svg class="glyph stroked chevron-right">
              <use xlink:href="#stroked-chevron-right"></use>
            </svg> Manajemen Mapel
          </a>
        </li>
        <li class="<?= $current_page == 'siswa' ? 'active' : ''; ?>">
          <a class="" href="<?= base_url('siswa'); ?>">
            <svg class="glyph stroked chevron-right">
              <use xlink:href="#stroked-chevron-right"></use>
            </svg> Manajemen Siswa
          </a>
        </li>
      </ul>
    </li>
    <li role="presentation" class="divider"></li>
    <li class="<?= $current_page == 'kelas' ? 'active' : ''; ?>">
      <a href="<?= base_url('kelas'); ?>">
        <svg class="glyph stroked calendar">
          <use xlink:href="#stroked-calendar"></use>
        </svg> Manajemen Kelas
      </a>
    </li>
    <li class="<?= $current_page == 'angkatan' ? 'active' : ''; ?>">
      <a href="<?= base_url('angkatan'); ?>">
        <svg class="glyph stroked line-graph">
          <use xlink:href="#stroked-line-graph"></use>
        </svg> Manajemen Angkatan
      </a>
    </li>
    <li class="<?= $current_page == 'peringkat' ? 'active' : ''; ?>">
      <a href="<?= base_url('peringkat'); ?>">
        <svg class="glyph stroked table">
          <use xlink:href="#stroked-table"></use>
        </svg> Manajemen Peringkat
      </a>
    </li>
    <li class="<?= $current_page == 'kenaikan' ? 'active' : ''; ?>">
      <a href="<?= base_url('kenaikan'); ?>">
        <svg class="glyph stroked table">
          <use xlink:href="#stroked-table"></use>
        </svg> Manaj. Keterangan Naik
      </a>
    </li>
    <li role="presentation" class="divider"></li>
    <li class="<?= $current_page == 'kelompok' ? 'active' : ''; ?>">
      <a href="<?= base_url('kelompok'); ?>">
        <svg class="glyph stroked table">
          <use xlink:href="#stroked-table"></use>
        </svg> Manaj. Kelompok Mapel
      </a>
    </li>
    <li class="<?= $current_page == 'mapel' ? 'active' : ''; ?>">
      <a href="<?= base_url('mapel'); ?>">
        <svg class="glyph stroked pencil">
          <use xlink:href="#stroked-pencil"></use>
        </svg> Manajemen Mapel
      </a>
    </li>

    <!-- for custom peran guru -->
    <!-- <li class="< ?= $current_page == 'peran' ? 'active' : ''; ?>">
      <a href="< ?= base_url('peran'); ?>">
        <svg class="glyph stroked app-window">
          <use xlink:href="#stroked-app-window"></use>
        </svg> Manajemen Peran
      </a>
    </li> -->

    <li class="<?= $current_page == 'guru' ? 'active' : ''; ?>">
      <a href="<?= base_url('guru'); ?>">
        <svg class="glyph stroked star">
          <use xlink:href="#stroked-star"></use>
        </svg> Manajemen Guru
      </a>
    </li>
    <li class="<?= $current_page == 'ekskul' ? 'active' : ''; ?>">
      <a href="<?= base_url('ekskul'); ?>">
        <svg class="glyph stroked star">
          <use xlink:href="#stroked-star"></use>
        </svg> Manajemen Ekskul
      </a>
    </li>
    <li role="presentation" class="divider"></li>
  </ul>
</div>
<!--/.sidebar-->
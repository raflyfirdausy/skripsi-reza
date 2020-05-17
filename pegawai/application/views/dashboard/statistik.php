<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Statistik Pegawai</h4>
            </div>

        </div>
    </div>

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <?php if ($this->session->flashdata("sukses")) : ?>
                    <div class="alert alert-success"> <?= $this->session->flashdata("sukses") ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata("gagal")) : ?>
                    <div class="alert alert-danger"> <?= $this->session->flashdata("gagal") ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="jabatan" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="statistik_agama" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="pendidikan" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <canvas id="kecamatan" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<script src="<?= asset('website/nice/assets/libs/chart.js/dist/Chart.min.js') ?>"></script>

<script>
    new Chart(document.getElementById("statistik_agama"), {
        type: 'bar',
        data: {
            labels: ["Islam", "Kristen", "Katholik", "Hindu", "Budha", "Konghuchu"],
            datasets: [{
                label: "Orang",
                backgroundColor: ["#03a9f4", "#e861ff", "#08ccce", "#e2b35b", "#e40503", "#14a83e"],
                data: <?= $agama ?>
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Statistik Agama Pegawai'
            }
        }
    });

    new Chart(document.getElementById("pendidikan"), {
        type: 'pie',
        data: {
            labels: [
                "TIDAK/BLM SEKOLAH",
                "SD",
                "SLTP/SEDERAJAT",
                "SLTA/SEDERAJAT",
                "DIPLOMA I",
                "AKADEMI/DIPLOMA III/SARJANA MUDA",
                "DIPLOMA IV",
                "SARJANA/S1",
                "MAGISTER/S2",
                "DOKTOR/S3"
            ],
            datasets: [{
                label: "Orang",
                backgroundColor: [
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242"
                ],
                data: <?= $pendidikan ?>
            }]
        },
        options: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Statistik Pendidikan Pegawai'
            }
        }
    });

    new Chart(document.getElementById("jabatan"), {
        type: 'pie',
        data: {
            labels: <?= $nama_jabatan ?>,
            datasets: [{
                label: "Orang",
                backgroundColor: [
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    
                ],
                data: <?= $jmlJabatan ?>
            }]
        },
        options: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Statistik Jabatan Pegawai'
            }
        }
    });

    new Chart(document.getElementById("kecamatan"), {
        type: 'pie',
        data: {
            labels: <?= $nama_kecamatan ?>,
            datasets: [{
                label: "Orang",
                backgroundColor: [
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    "#03a9f4",
                    "#e861ff",
                    "#08ccce",
                    "#e2b35b",
                    "#e40503",
                    "#14a83e",
                    "#fe6383",
                    "#36a2eb",
                    "#fb5839",
                    "#223242",
                    
                ],
                data: <?= $jmlKecamatan ?>
            }]
        },
        options: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Statistik Jabatan Pegawai Berdasarkan Kecamatan'
            }
        }
    });


</script>
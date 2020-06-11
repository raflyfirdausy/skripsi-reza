<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-title">Dashboard</h4>
            </div>          
        </div>
    </div>

    <!-- Container fluid  -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <i class="mdi mdi-emoticon font-20 text-info"></i>
                                        <p class="font-14 m-b-5">Total Aset</p>
                                    </div>
                                    <div class="col-5">
                                        <h1 class="font-light text-right mb-0"><?= $barang ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-7">
                                        <i class="mdi mdi-emoticon font-20 text-success"></i>
                                        <p class="font-14 m-b-5">Total Peminjaman</p>
                                    </div>
                                    <div class="col-5">
                                        <h1 class="font-light text-right mb-0"><?= $peminjaman ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

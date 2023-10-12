<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="row" ng-controller="laporanController">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body d-flex">
                <div class="form-group row mr-auto" style="width: 1000px;">
                    <label class="control-label col-md-2">Jenis Surat</label>
                    <div class="col-md-4">
                        <select class="form-control" ng-model="surat" ng-change="getData(surat)">
                            <option value="masuk">Surat Masuk</option>
                            <option value="keluar">Surat Keluar</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-primary btn-sm" ng-click="print(surat)"><i class="fa fa-print" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex">
                <h4 class="mr-auto p-2">Daftar Table</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" ng-show="surat == 'masuk'">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Surat</th>
                                <th>No Surat</th>
                                <th>Perihal</th>
                                <th>Sifat Surat</th>
                                <th>Pengirim</th>
                                <th>Jenis Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas">
                                <td>{{$index+1}}</td>
                                <td>{{item.tanggal | date: "d MMMM y"}}</td>
                                <td>{{item.no_surat}}</td>
                                <td>{{item.perihal}}</td>
                                <td>{{item.sifat_surat}}</td>
                                <td>{{item.pengirim}}</td>
                                <td>{{item.nama_jenis}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" ng-show="surat == 'keluar'">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Surat</th>
                                <th>No Surat</th>
                                <th>Perihal</th>
                                <th>Sifat Surat</th>
                                <th>Tujuan</th>
                                <th>Jenis Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas">
                                <td>{{$index+1}}</td>
                                <td>{{item.tanggal | date: "d MMMM y"}}</td>
                                <td>{{item.no_surat}}</td>
                                <td>{{item.perihal}}</td>
                                <td>{{item.sifat_surat}}</td>
                                <td>{{item.tujuan}}</td>
                                <td>{{item.nama_jenis}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
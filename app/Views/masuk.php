<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="row" ng-controller="masukController">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Daftar Surat Masuk</h4>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modelId"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Surat</th>
                                <th>No Surat</th>
                                <th>Perihal</th>
                                <th>Sifat Surat</th>
                                <th>Pengirim</th>
                                <th>Jenis Surat</th>
                                <th width="10%"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas.masuk">
                                <td>{{$index+1}}</td>
                                <td>{{item.tanggal}}</td>
                                <td>{{item.no_surat}}</td>
                                <td>{{item.perihal}}</td>
                                <td>{{item.sifat_surat}}</td>
                                <td>{{item.pengirim}}</td>
                                <td>{{item.nama_jenis}}</td>
                                <td>
                                    <button class="btn btn-warning btn-circle" ng-click="edit(item)"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-circle" ng-click="delete(item)"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Surat masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="form" ng-submit="save()">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="tile-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Nomor Surat</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" ng-model="model.no_surat" placeholder="Nomor Surat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Perihal</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" ng-model="model.perihal" placeholder="Perihal" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Tanggal Surat</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="date" ng-model="model.tanggal" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sifat Surat</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" ng-model="model.sifat_surat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Pengirim</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" ng-model="model.pengirim" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Isi Surat</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="4" ng-model="model.isi_surat" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Jenis Surat</label>
                                    <div class="col-md-9">
                                        <select class="form-control" required ng-options="item as item.nama_jenis for item in datas.jenis " ng-model='itemJenis' ng-change="model.id_jenis=itemJenis.id; model.nama_jenis=itemJenis.nama_jenis"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">File Surat</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="files"  ng-model="model.berkas" maxsize="1000" base-sixty-four-input>
                                        <span style="color: red;" ng-show="form.files.$error.maxsize">Tidak boleh leboh dari 1 Mb</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
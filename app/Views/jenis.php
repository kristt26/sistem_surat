<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="row" ng-controller="jenisController">
    <div class="col-md-4">
        <div class="tile">
            <h3 class="tile-title">Tambah Jenis Surat</h3>
            <form ng-submit="save()">
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label">Jenis Surat</label>
                        <input class="form-control" type="text" ng-model="model.nama_jenis" placeholder="Jenis Surat">
                    </div>
                </div>
                <div class="tile-footer">
                    <button type="submit" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-secondary" onclick="reset()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis</th>
                                <th>Status</th>
                                <th width="10%"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas">
                                <td>{{$index+1}}</td>
                                <td>{{item.nama_jenis}}</td>
                                <td>{{item.status_jenis=='0' ? 'Tidak Aktif':'Aktif'}}</td>
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
</div>
<?= $this->endSection() ?>
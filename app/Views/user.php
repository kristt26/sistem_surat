<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="row" ng-controller="userController">
    <div class="col-md-4">
        <div class="tile">
            <h3 class="tile-title">Tambah User</h3>
            <form ng-submit="save()">
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label">Nama Unit Kerja</label>
                        <select class="form-control" required ng-options="item as item.nama_unit_kerja for item in datas.unit " ng-model='itemJenis' ng-change="model.unit_kerja_id=itemJenis.id; model.nama_unit_kerja=itemJenis.nama_unit_kerja"></select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input class="form-control" type="text" ng-model="model.username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" type="text" ng-model="model.password" placeholder="Password">
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
                                <th>Username</th>
                                <th>Nama Unit Kerja</th>
                                <th width="10%"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas.user">
                                <td>{{$index+1}}</td>
                                <td>{{item.username}}</td>
                                <td>{{item.nama_unit_kerja}}</td>
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
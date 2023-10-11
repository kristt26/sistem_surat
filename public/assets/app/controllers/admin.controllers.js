angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('jenisController', jenisController)
    .controller('unitController', unitController)
    .controller('masukController', masukController)
    .controller('keluarController', keluarController)
    .controller('userController', userController)
    ;

function dashboardController($scope, dashboardServices) {
    $scope.$emit("SendUp", "Dashboard");
    $scope.datas = {};
    $scope.title = "Dashboard";
    alert("OK");
    // dashboardServices.get().then(res=>{
    //     $scope.datas = res;
    // })
}

function jenisController($scope, jenisServices, pesan) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    $.LoadingOverlay('show');
    jenisServices.get().then((res) => {
        $scope.datas = res;
        $.LoadingOverlay('hide');
    })
    
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                jenisServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                    $.LoadingOverlay('hide');
                })
            } else {
                jenisServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                    $.LoadingOverlay('hide');
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            jenisServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}

function unitController($scope, unitServices, pesan) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    $.LoadingOverlay('show');
    unitServices.get().then((res) => {
        console.log(res);
        $scope.datas = res;
        $.LoadingOverlay('hide');
    })
    
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                unitServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                    $.LoadingOverlay('hide');
                })
            } else {
                unitServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                    $.LoadingOverlay('hide');
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            unitServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}

function masukController($scope, masukServices, helperServices, pesan) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    $.LoadingOverlay('show');
    $scope.tampilPDF = false;
    masukServices.get().then((res) => {
        console.log(res);
        $scope.datas = res;
        $.LoadingOverlay('hide');
    })
    
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                masukServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                    $("#modelId").modal('hide');
                    $.LoadingOverlay('hide');
                })
            } else {
                masukServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                    $("#modelId").modal('hide');
                    $.LoadingOverlay('hide');
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.model.tanggal = new Date($scope.model.tanggal);
        $("#modelId").modal('show');
        $scope.itemJenis = $scope.datas.jenis.find(x=>x.id==item.id_jenis);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            masukServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
    
    $scope.showFile = (item)=>{
        // $scope.dataFile = item.file;
        window.open(helperServices.url + "assets/berkas/" + item.file, '_blank').focus();
    }

    $scope.createDispo = (param)=>{
        $scope.dataItem = param;
        $scope.dataItem.tanggal = new Date($scope.dataItem.tanggal);
        $scope.model.surat_masuk_id = param.id;
        $("#dispo").modal('show');
    }

    $scope.tambahDispo = ()=>{
        pesan.dialog('Anda Yakin?', 'Yes', 'Tidak').then(res => {
            $.LoadingOverlay('show');
            masukServices.disposisi($scope.model).then(res => {
                $scope.model = {};
                pesan.Success("Berhasil mengubah data");
                $("#dispo").modal('hide');
                $.LoadingOverlay('hide');
            })
        })
        console.log($scope.model);
    }
}

function keluarController($scope, keluarServices, helperServices, pesan) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    $.LoadingOverlay('show');
    $scope.tampilPDF = false;
    keluarServices.get().then((res) => {
        console.log(res);
        $scope.datas = res;
        $.LoadingOverlay('hide');
    })
    
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                keluarServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                    $("#modelId").modal('hide');
                    $.LoadingOverlay('hide');
                })
            } else {
                keluarServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                    $("#modelId").modal('hide');
                    $.LoadingOverlay('hide');
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.model.tanggal = new Date($scope.model.tanggal);
        $("#modelId").modal('show');
        $scope.itemJenis = $scope.datas.jenis.find(x=>x.id==item.id_jenis);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            keluarServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
    
    $scope.showFile = (item)=>{
        // $scope.dataFile = item.file;
        window.open(helperServices.url + "assets/berkas/" + item.file, '_blank').focus();
    }
}

function userController($scope, userServices, pesan) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    $.LoadingOverlay('show');
    userServices.get().then((res) => {
        console.log(res);
        $scope.datas = res;
        $.LoadingOverlay('hide');
    })
    
    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                userServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                    $.LoadingOverlay('hide');
                })
            } else {
                userServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                    $.LoadingOverlay('hide');
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            userServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}
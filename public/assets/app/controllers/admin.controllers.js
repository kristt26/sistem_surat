angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('wijkController', wijkController)
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

function wijkController($scope, wijkServices, pesan) {
    $scope.$emit("SendUp", "Pembobotan Faktor");
    $scope.datas = {};
    $scope.model = {};
    wijkServices.get().then((res) => {
        $scope.datas = res;
    })

    $scope.setInisial = (item) => {
        $scope.model.inisial = item.substring(0, 3).toUpperCase();
    }

    $scope.save = () => {
        pesan.dialog('Yakin ingin?', 'Yes', 'Tidak').then(res => {
            if ($scope.model.id) {
                wijkServices.put($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil mengubah data");
                })
            } else {
                wijkServices.post($scope.model).then(res => {
                    $scope.model = {};
                    pesan.Success("Berhasil menambah data");
                })
            }
        })
    }

    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin?', 'Ya', 'Tidak').then(res => {
            wijkServices.deleted(param).then(res => {
                pesan.Success("Berhasil menghapus data");
            })
        });
    }
}
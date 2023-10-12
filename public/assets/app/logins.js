angular.module('logins', ['auth.service', 'helper.service','message.service', 'swangular'])
    .controller('loginController', loginController);

function loginController($scope, AuthService, helperServices) {
    $scope.role = [];
    $scope.model = {};
    $scope.model.username = "Administrator";
    $scope.model.password = "Administrator#1";
    sessionStorage.clear();
    $scope.login = ()=>{
        $.LoadingOverlay("show");
        AuthService.login($scope.model).then((res)=>{
            document.location.href= helperServices.url;
        })
    }
}

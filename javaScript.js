var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.title = "Met Hotels";
    $scope.about = "O hotelu";
    $scope.reservation = "Rezervacija smeštaja";
    $scope.registration = "Registracija";
    $scope.login = "Log in";
    $scope.contentTitle = "Dobro došli u 'Met Hotels'!";
    $scope.aboutTitle = "O hotelu";
    $scope.reservationTitle = "Rezervacija smeštaja";
    $scope.registrationTitle = "Registracija";
    $scope.addRoom = "Dodavanje sobe";
    $scope.addRoomTitle = "Dodavanje novih soba u hotel";
    $scope.changeRoomTitle = "Izmena podataka o sobi";

    $scope.roomNum;
    $scope.bedNum;
    $scope.size;
    $scope.desc;

    $scope.reserve = function() {
    	alert("Uspešno ste rezervisali smeštaj!");
    };

    $(document).ready(function(){
        $('#table').DataTable();
    });

   
});
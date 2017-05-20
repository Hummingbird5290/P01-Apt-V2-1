var app = angular.module("myapp", []);
  app.controller("usercontroller",
    function ($scope, $http) {
      $scope.btnName = "บันทึกข้อมูล";
      $id = null;
      $scope.insertData = function (id) {
        $scope.id = id;
        if ($scope.firstname1 == null) {
          alert("กรุณาระบุชื่อรายการ...!!!");
        } else if ($scope.lastname == null) {
          alert("กรุณาระบุจำนวนเงิน...!!");
        } else {
          $http.post("insert.php", {
            'firstname1': $scope.firstname1,
            'lastname': $scope.lastname,
            'btnName': $scope.btnName,
            //'id': $scope.id,
            'roomid':$scope.roomid,
            'roomno':$scope.roomno
          }).success(function (data) {
            alert(data);
            $scope.firstname1 = null;
            $scope.lastname = null;
            $scope.btnName = "บันทึกข้อมูล";
            //$scope.roomno =null;
            $scope.displayData(id);
          });
        }
      }
      $scope.displayData = function (id) {
        $id = id;
        var config = {params: {id: $id}}
        $http.get("select.php",config)
        .success(function (data) {
            $scope.names = data;
          });
        $http.get("selectroom.php")
          .success(function (data) {
            $scope.names1 = data;
          });
      }     
      $scope.updateData = function (id,room_no,first_name, last_name) {
        $scope.id = id;
        $scope.roomno = room_no;
        $scope.firstname1 = first_name;
        $scope.lastname = last_name;
        $scope.btnName = "แก้ไขข้อมูล";
      }
      $scope.selectroom = function (id,roomno) {
        $id = id;
        $scope.id = id;
        $scope.roomid=id;
        $scope.roomno = roomno;
        $scope.firstname1 = null;
        $scope.lastname = $scope.lastname;
        $scope.displayData(id);
        $scope.btnName = "บันทึกข้อมูล";
      }
          $scope.deleteData = function(Id){  
           if(confirm("ยืนยันการลบข้อมูล?????"))  
           {  
                $http.post("delete.php", {'id':Id})  
                .success(function(data){  
                     alert(data);  
                     $scope.displayData();  
                });  
           }  
           else  
           {  
                return false;  
           }  
      } 
      // $scope.deleteData = function (id) {
      //   if (confirm("ยืนยันการลบข้อมูล?????")) {
      //     $http.post("delete.php", {
      //       'id': id
      //     })
      //       .success(function (data) {
      //         alert(data);
      //         $scope.displayData(id);
      //         //location.reload();
      //       });
      //   } else {
      //     return false;
      //   }
    });

<!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>-->
<script src="jscontrollers/angular.min.js"></script>
<script src="jscontrollers/myapp.js" type="text/javascript"></script>

<?php 
    //require("controllers/RoomCls.php");            
    //$Room = new Room();
   // $Id=0;
            
      if(!isset($_SESSION)){ 
        session_start(); 
        }
                                      
  ?>
<section class="content">
  <div class="row">
   <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">รายการพิมพ์ใบอื่นๆ</h3>
          <div class="box-body">
            <br>
            <div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label" style="text-align:right;">ห้อง</label>
                <div class="col-sm-2">
                 <input type="hidden" ng-model="idbill" />  
                 <input type="hidden" name="room_id" ng-model="roomid" class="form-control" placeholder="เลือกหมายเลขห้อง" 
                  readonly />
                </div>
                <div class="col-sm-8">
                 <input type="text" name="room_no" ng-model="roomno" class="form-control" placeholder="เลือกหมายเลขห้อง" 
                  readonly />
                </div>
                <br><br>
                <label for="inputPassword3" class="col-sm-3 control-label" style="text-align:right;">ชื่อรายการ</label>
                <div class="col-sm-8">
                  <input type="text" name="first_name" ng-model="firstname1" class="form-control" placeholder="ระบุชื่อรายการ" 
                   />
                </div>
                <br><br>
                <label for="inputPassword3" class="col-sm-3 control-label" style="text-align:right;">จำนวนเงิน</label>
                <div class="col-sm-8">
                  <input type="text" name="last_name" ng-model="lastname" class="form-control" placeholder="ระบุตัวเลข" />
                </div>
                <br><br><br>
                <center>
                  <input type="submit" name="btnInsert" class="btn btn-success" ng-click="insertData()" value="{{btnName}}" />
                  <!--<input type="submit" name="btnPrint" class="btn btn-primary" ng-click="insertData()" value="{{btnName}}" />-->
                  <!--<a href=\"Formprintreceipt.php?id=$roomID&type=2&bid=$billId \"onclick=\"window.open(this.href,'window','width=840,height=880,resizable,scrollbars,toolbar,menubar') ;return false;\">พิมพ์ใบจอง<a>-->
                  <a href="Formprintreceipt.php?id=1&bid=1&type=4" 
                  onclick="window.open(this.href,'window','width=840,height=880,resizable,scrollbars,toolbar,menubar') ;return false;
                  " target="_blank" class="btn btn-primary">พิมพ์</a>
                </center>
              </div>
              <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                  <th>เลขที่ห้อง</th>
                  <th>ชื่อรายการ</th>
                  <th>จำนวนเงิน</th>
                  <th></th>
                  <th></th>               
                </tr>
                <tr ng-repeat="x in names">                 
                  <td>{{x.roomno}}</td>
                  <td>{{x.Detail}}</td> 
                  <td>{{x.Price}}</td>
                  <td><button ng-click="updateData(x.Id,x.roomno,x.Detail,x.Price)"class="btn btn-warning btn-xs">แก้ใขข้อมูล</button></td>
                  <td><button ng-click="deleteData(x.Id )"class="btn btn-danger btn-xs">ลบ</button></td>
                </tr>
              </table>
              
              
            </div>
    
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">เลือกห้องที่ต้องการทำรายการ</h3>
        </div>
        <div class="box-body">  
        <form class="form-inline">
        <div class="form-group">
            <label >Search</label>
            <input type="text" ng-model="search" class="form-control" placeholder="Search">
        </div>
    </form>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                  <th></th>
                  <th style="text-align:center;">เลขที่ห้อง</th>
                  <th style="text-align:center;">ประเภทห้อง</th>
                  <th style="text-align:center;">สถานะห้อง</th>
                  
                </tr>
                <tr ng-repeat="m in names1">                 
                  <td style="text-align:center;"><button ng-click="selectroom(m.roomid,m.roomno)" class="btn btn-info btn-xs">เลือกห้อง</button></td>
                  <td style="text-align:center;">{{m.roomno}}</td> 
                  <td style="text-align:center;">{{m.roomtype}}-{{m.roomdel}}</td>
                  <td style="text-align:center;">{{m.roomsta}}</td>
                </tr>
              </table>
               <dir-pagination-controls
                max-size="10"
                direction-links="true"
                boundary-links="true" >
              </dir-pagination-controls>

             
              <!--<script>
    var app = angular.module('ngTableApp', ['ngTable'])
          .controller('selectFilterController', function($scope, $filter, $q, NgTableParams) {
            var data = [{name: "Moroni", age: 50},
                        {name: "Tiancum", age: 43},
                        {name: "Jacob", age: 27},
                        {name: "Nephi", age: 29},
                        {name: "Enos", age: 34},
                        {name: "Tiancum", age: 43},
                        {name: "Jacob", age: 27},
                        {name: "Nephi", age: 29},
                        {name: "Enos", age: 34},
                        {name: "Tiancum", age: 43},
                        {name: "Jacob", age: 27},
                        {name: "Nephi", age: 29},
                        {name: "Enos", age: 34},
                        {name: "Tiancum", age: 43},
                        {name: "Jacob", age: 27},
                        {name: "Nephi", age: 29},
                        {name: "Enos", age: 34}
                    ];
            $scope.names = [{id: "", title: ""}, {id: 'Moroni', title: 'Moroni'}, {id: 'Enos', title: 'Enos'}, {id: 'Nephi', title: 'Nephi'}];
            $scope.tableParams = new NgTableParams({page: 1, count: 10}, {data: data});
            
          })
          </script>
 

  <div ng-app="ngTableApp">
    <h1>NgTable with select filters</h1>
    <div ng-controller="selectFilterController">
      <table ng-table="tableParams" class="table" show-filter="true">
        <tbody>
          <tr ng-repeat="row in $data">
            <td data-title="'Name'" filter="{name: 'select'}" filter-data="names" sortable="'name'">{{ row.name }}</td>
            <td data-title="'Age'" filter="{age: 'text'}" sortable="'age'">{{ row.age }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>-->
           
    
          </div>
      </div>
    </div>
  </div>
 </div>
</session>

/* ------------------------------------------------------- 

* Filename:     AngularJS Dynamic Form Fields
* Website:      http://www.shanidkv.com
* Description:  Shanidkv AngularJS blog
* Author:       Shanid KV shanidkannur@gmail.com

---------------------------------------------------------*/

var app = angular.module('shanidkvApp', []);

  app.controller('MainCtrl', function($scope) {

  $scope.choices = [{id: 1}];
  
  $scope.addNewChoice = function() {
    var newItemNo = $scope.choices.length+1;
    $scope.choices.push({'id': +newItemNo});
  };
    
  $scope.removeChoice = function() {
    var lastItem = $scope.choices.length-1;
    $scope.choices.splice(lastItem);
  };
  
});

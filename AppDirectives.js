angular.module('ContactType',[]).directive('contactType', function($compile, $rootScope, $templateRequest, $sce) {
  return {
    restrict: "E",
    scope: {
      contactTypeId: '@'
    },
    link: function(scope, element, attrs) {

      var templateUrl = $sce.getTrustedResourceUrl('ContactType.html');
      $templateRequest(templateUrl).then(function(template) {
        var linkFn = $compile(template);
        var htmlString = linkFn(scope);
        element.append(htmlString);

      }, function() {
        // An error has occurred
      });


    },
    controller: function($rootScope, $scope, $element, ContactTypesService) {
      $scope.contacts = $rootScope.GetContactTypes;

      //Get the Id of Directive
      //console.log($scope.contactTypeId);


      $scope.Delete = function(e) {
        // console.log(e.currentTarget.id);

        //remove element and also destoy the scope that element
        $element.remove();
        $scope.$destroy();
        //$rootScope.controlCount--;

      }
    }
  }
});

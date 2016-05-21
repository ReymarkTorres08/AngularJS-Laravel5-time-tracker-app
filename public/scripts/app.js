(function() {

	'use strict';

	angular.module('timeTracker', ['ngResource', 'ui.bootstrap'])
	.filter('myDateFormat', function myDateFormat($filter){
	  return function(text){
	    var  tempdate= new Date(text);
	    return $filter('date')(tempdate, "MMM-dd-yyyy");
	  };
	});

}());
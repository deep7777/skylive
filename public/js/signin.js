function signinController($scope,$http,$location) {
	$scope.errors = [];
    $scope.msgs = [];
    
	$scope.login = function(){

        if(typeof $scope.username == "undefined" || typeof $scope.pwd == "undefined"){
           return false;
        }
        else{
        	var postobj = new Object();
			postobj.username = $scope.username;
	        postobj.pwd = $scope.pwd;
	        url="/public/login/add";
	        $http.post(url,postobj).success(function (data, status, headers, config) {			
	        	$scope.errors = [];
    			$scope.msgs = [];
				if (data.msg != ''){                    
                    window.location="/public/cnews";
                }
                else{                       
                    $scope.errors.push(data.error);
                }
				
			});
		}
		return false;
	}
	
    
}
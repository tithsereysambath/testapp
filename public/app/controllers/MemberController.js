app.controller("MemberController",function($scope, $http, $state){

	$scope.showall = function(){
		$http.get('http://localhost:8000/api/members').success(function(response){
			if(response.status){
				$scope.members = response.data;
			}
		})
	}

	$scope.add = function(){
		$http({
			method: 'POST',
			url: 'http://localhost:8000/api/members',
			headers:{'Content-Type': undefined},
			data: {
				name: $scope.name,
				address: $scope.address,
				age: $scope.age,
				photo: $scope.photo
			},
			transformRequest: function (data, headersGetter) {
               var fd = new FormData();
               angular.forEach(data, function (value, key) {
                   fd.append(key, value);
               });
               var headers = headersGetter();
               delete headers['Content-Type'];
               return fd;
           }
		}).success(function(response){
			if(response.status){
				$('#modal-create').modal('hide');
				$state.reload();
			}else{
				alert(response.message);
			}
		})

	}

	$scope.remove = function(id, index){
		$http.delete('http://localhost:8000/api/members/'+id).success(function(response){
			$scope.members.splice(index, 1);
		})
	}

	$scope.show = function(id){
		$http.get('http://localhost:8000/api/members/'+id).success(function(response){
			$scope.showMember = response.data;
		})
	}

	$scope.update = function()
	{
		
		$http.put('http://localhost:8000/api/members/'+$scope.showMember.id, $scope.showMember).success(function(response){
			$('#modal-update').modal('hide');
			$state.reload();
		});


	}

	$scope.uploadImg = function()
	{
		
		$http({
			method: 'POST',
			url: 'http://localhost:8000/uploadImg',
			headers:{'Content-Type': undefined},
			data: $scope.showMember,
			transformRequest: function (data, headersGetter) {
            var fd = new FormData();
            	angular.forEach(data, function (value, key) {
            	fd.append(key, value);
            });
	        var headers = headersGetter();
	        delete headers['Content-Type'];
	        return fd;
                       
           }
		}).success(function(response){
			if(response.status)
			{
				$scope.showMember.photo1 = response.data;
				alert(response.message);
			}
			else
			{
				alert(response.message);
			}
			
		})

	}
});




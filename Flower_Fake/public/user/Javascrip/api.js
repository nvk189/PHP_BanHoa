
app

app.controller("HomeCtrl", function ($scope, $http) {
  $scope.listItem = [];
  $scope.product1 = [];
  $scope.listItemhot=[];
  $scope.listItemNew=[];
  $scope.number_sales=[];
 
  $scope.click = function (){

    localStorage.setItem("searh_fr" , JSON.stringify($scope.searchuser_1))
    console.log(localStorage.getItem('searh_fr'))
  }
  $scope.GetBanChay = function () {
    $http({
      method: "GET",
      url: current_url + "/api/ThongKe/sanphamthongke?id=4",
    }).then(function (response) {
      console.log(response.data);
      $scope.listItem = response.data;

      for (var i = 0; i < $scope.listItem.length; i++) {
        $scope.number_sales[i] = ($scope.listItem[i].gia - $scope.listItem[i].giaGiam)/ $scope.listItem[i].gia * 100;
      }
      console.log($scope.number_sales);
      console.log($scope.listItem);
    });
  };
  $scope.GetBanChay();


  /// sản phẩm bán chay đặt nhiều nhất 

  $scope.GetHot = function () {
    $http({
      method: "GET",
      url: current_url + "/api/ThongKe/sanphamthongke?id=2",
    }).then(function (response) {
      console.log(response.data);
      $scope.listItemhot = response.data;
    });
  };
  $scope.GetHot();


  /////// sản phẩm mới 
  
  $scope.GetNew = function () {
    $http({
      method: "GET",
      url: current_url + "/api/ThongKe/sanphamthongke?id=1",
    }).then(function (response) {
      console.log(response.data);
      $scope.listItemNew = response.data;
    });
  };
  $scope.GetNew();


  $scope.number_sales = function(product) {
    return ((product.gia - product.giaGiam) / product.gia) * 100;
   
  };
  $scope.checkPriceSale = function(giaGiam) {
    return giaGiam !== 0;
};
});



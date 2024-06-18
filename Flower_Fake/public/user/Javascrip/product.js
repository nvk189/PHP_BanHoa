
var app = angular.module("AppBanHoa", []);
app.controller("ListCtrl", function ($scope, $http) {
   
    // $scope.listsearch=[];
    // $scope.page ='1';
    // $scope.pageSize= '12',
    // $scope.tenSanPham ='hoa'
    $scope.sign = function() {
        // var data = {
        //     page: $scope.page,
        //     pageSize: $scope.pageSize,
        //     tenSanPham: $scope.tenSanPham
        // };
        $http({
            method: 'GET',
            url: 'https://localhost:7261/api/SanPham/get-all',
            // data: data,
        })
        .then(function(response) {
            $scope.listsearch = response.data;
            updatePagination($scope.listsearch)
    
         
        })
    }
    
    $scope.sign();
    
    // Lấy dữ liệu từ localStorage
   
    console.log(localStorage.getItem('sx'));



     // phân trang
   function updatePagination(maloaisp) {
    $scope.currentPage = 1;
    $scope.itemsPerPage = 8;
    $scope.pages = [];
    $scope.totalPages = 0;
    $scope.about= maloaisp.length
    $scope.totalPages = Math.ceil(maloaisp.length / $scope.itemsPerPage);
    for (var i = 1; i <= $scope.totalPages; i++) {
        $scope.pages.push(i);
    }
    $scope.getData = function () {
        var begin = ($scope.currentPage - 1) * $scope.itemsPerPage;
        var end = begin + $scope.itemsPerPage;
        $scope.listsearch = maloaisp.slice(begin, end);
    };
    $scope.setPage = function (page) {
        $scope.currentPage = page;
        $scope.getData();
    };
    $scope.getData();
  }


  $scope.number_sales = function(product) {
    return ((product.gia - product.giaGiam) / product.gia) * 100;
   
  };
})
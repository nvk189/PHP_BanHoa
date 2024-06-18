app 
app.controller("SearchUser", function ($scope, $http) {
    $scope.searchsp=[];
   
    $scope.number_sales = function(product) {
      return ((product.gia - product.giaGiam) / product.gia) * 100;
    
    };
    $scope.searchuser =JSON.parse (localStorage.getItem('searh_fr'))
    $scope.timkiemsp = function() {

    // if(document.getElementById('text-search').value!=''){
     

        var data ={
            page :1,
            pageSize : 10000,
            tenSanPham : $scope.searchuser
        }
      
      
      console.log(data)
      $http({
        method: 'POST',
        url: current_url_use + "/api/SanPham/search",
  
        data : JSON.stringify(data)
    })
    .then(function(response) {
      
      $scope.searchsp = response.data.data;
      console.log($scope.searchsp)
      updatePagination($scope.searchsp)
    })
    // }
    // else{
    //   alert("Nhập thông tin tìm kiếm")
    // }
   }
   $scope.timkiemsp()
   
    /// phân trang
    function updatePagination(maloaisp) {
        $scope.currentPage = 1;
        $scope.itemsPerPage = 8;
        $scope.about= maloaisp.length
        $scope.pages = [];
        $scope.totalPages = 0;
        $scope.totalPages = Math.ceil(maloaisp.length / $scope.itemsPerPage);
        for (var i = 1; i <= $scope.totalPages; i++) {
            $scope.pages.push(i);
        }
        $scope.getData = function () {
            var begin = ($scope.currentPage - 1) * $scope.itemsPerPage;
            var end = begin + $scope.itemsPerPage;
            $scope.searchsp = maloaisp.slice(begin, end);
        };
        $scope.setPage = function (page) {
            $scope.currentPage = page;
            $scope.getData();
        };
        $scope.getData();
      }
    // $scope.timkiemsp()
  })
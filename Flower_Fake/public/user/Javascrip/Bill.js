app 
app.controller("BillCtrl", function ($scope, $http) {
$scope.Bill=[]
$scope.datadh = [];
$scope.totalbill=0;
$scope.listBill=[];
$scope.BillOne =[];
var selectproduct = localStorage.getItem('productbill');
var product = localStorage.getItem('sanpham');
// $scope.listBill = JSON.parse(selectproduct) 
// $scope.BillOne =JSON.parse(product);


// xóa 
$scope.removeProduct = function(index) {
    $scope.listBill.splice(index, 1);

    // Cập nhật local storage sau khi thực hiện xóa
    localStorage.setItem('productbill', JSON.stringify($scope.listBill));

    // // Cập nhật $scope.Bill (nếu cần)
    // $scope.Bill = angular.copy($scope.listBill);
    TotalBill()
    };
console.log(selectproduct)
console.log(product)

if (selectproduct) {
    $scope.Bill =[]
    $scope.listBill = JSON.parse(selectproduct) 
    $scope.listBill.forEach(function(item) {
        $scope.Bill.push({
            maSanPham: item.maSanPham,
            soLuong: item.soLuong,
            gia: item.gia
        });
        console.log($scope.listBill)
    });
}
    
else{
    alert("Chọn sản phẩm trong giỏ hàng ")
}

$scope.Bill.map(function(item) {
    $scope.datadh.push({
       
        maSP: item.maSanPham,
       
    });
});

// hàm tính tổng tiền
function TotalBill() {
    var total = 0;
    for (var i = 0; i < $scope.Bill.length; i++) {
        total += $scope.Bill[i].soLuong * $scope.Bill[i].gia;
    }
    return total;
}

// Gọi hàm để lấy tổng tiền và gán vào biến $scope.totalAmount
$scope.totalbill = TotalBill();
console.log($scope.totalbill)


$scope.user =JSON.parse (localStorage.getItem('newcart'))
$scope.matk= $scope.user[0].maTaiKhoan

$scope.hoten= $scope.user[0].hoTen
$scope.email= $scope.user[0].email
$scope.dienthoai= $scope.user[0].dienThoai
$scope.diachi= $scope.user[0].diaChi

$scope.them = function(){
      var data= {
        hoTen : $scope.hoten,
        dienThoai : $scope.dienthoai,
        diaChi : $scope.diachi,
        ngayDatHang : $scope.ngaygiao,
        ngayGiaoHang : $scope.ngaygiao,
        tongTien : $scope.totalbill,
        trangThai : true,
        list_json_chitiethoadon: $scope.Bill
      }
     
      
   $http({
        method: 'POST',
        url: current_url_use + "/api/HoaDon/create-hoadon",
        data: JSON.stringify(data),
    })
    .then(function(response) {
      $scope.createBan = response.data;
    //   console.log($scope.createBan)
        var datadh ={
            maDH: 0,
            maTk: $scope.matk,
            list_json_chitietdonhang:$scope.datadh
        }

        console.log(datadh)
        $http({
            method: 'POST',
            url: current_url_use + "/api/DonHang/create-hoadon",
            data: JSON.stringify(datadh),
        })
        .then(function(response) {
          $scope.DonHang = response.data;
          console.log($scope.DonHang)
        })
      alert('Đặt hàng thành công')
    //   window.location.href="/html/Home.html"
    });
    }  
})
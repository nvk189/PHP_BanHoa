app

app.controller("UserCtrl", function ($scope, $http) {

    $scope.user =[];
    $scope.matkhau=''
    $scope.user =JSON.parse (localStorage.getItem('newcart'))
    $scope.hoten= $scope.user[0].hoTen
    $scope.email= $scope.user[0].email
    $scope.dienthoai= $scope.user[0].dienThoai
    $scope.diachi= $scope.user[0].diaChi
    // console.log($scope.user[0].maChiTietTaiKhoan)
    // console.log($scope.user)


 
        

    /// cập nhật thông tin khách hàng
    $scope.updateUser = function (){
        var data ={
            maChiTietTaiKhoan : $scope.user[0].maChiTietTaiKhoan,
            hoTen:  $scope.hoten,
            email:   $scope.email,
            dienThoai:  $scope.dienthoai,
            diaChi: $scope.diachi
        }
        $http ({
            method: 'POST',
            url: current_url_use + "/api/TaiKhoan1/update_user",
            data: JSON.stringify(data),
        })
        .then(function(response){
            alert("Cập nhật thành công")
            localStorage.setItem('newcart',response.data)
        })

    }
    // cập nhật mật khẩu của khách hàng
    $scope.updatePassUser = function (){
        if( $scope.matkhau === $scope.xnmatkhau){

          
            var data = {
                maTaiKhoan: $scope.user[0].maTaiKhoan,
                tenDangNhap: 'string', 
                matKhau: $scope.matkhau,
                maLoaiTaiKhoan: 0,
                trangThai: true,
                list_json_chitiettaikhoan: [
                    {
                        maChiTietTaiKhoan: 0,
                        maTaiKhoan: 0,
                        hoTen: 'string', 
                        email: 'string', 
                        dienThoai: 'string', 
                        diaChi: 'string' 
                    }
                ],
                model: 'null'
            };
            console.log(data)
            $http ({
                method: 'POST',
                url: "https://localhost:7165/api/TaiKhoan1/update_user_pass",
                data: JSON.stringify(data),
            })
            .then(function(response){
                console.log(response.data)
                alert("Cập nhật thành công")
                // window.location.href='./account.html'
                
            })
        }
        else{
            alert('Mật khẩu không trùng nhau  , kiểm tra lại')
        }

    }
})






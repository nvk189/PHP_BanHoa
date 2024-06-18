app;

// chi tiết sản phẩm
app.controller("Detail", function ($scope, $http) {
  $scope.listdetail = [];
  $scope.detailitem = [];

  $scope.numbersp = 1;
  $scope.list = [];
  // var urlObject ='';
  urlObject = new URL(window.location.href);
  var id = urlObject.searchParams.get("id");

  $scope.id = id;
  $scope.Detail = function () {
    $http({
      method: "GET",
      // url: `https://localhost:7261/api/SanPham/get-id/${$scope.id}`,
      url: `https://localhost:7165/api/SanPham/get-id/${$scope.id}`,
    }).then(function (response) {
      $scope.listdetail = response.data;
      if ($scope.listdetail.giaGiam != 0) {
        $scope.giacart = 0;
        $scope.giacart = $scope.listdetail.giaGiam;
      } else {
        $scope.giacart = 0;
        $scope.giacart = $scope.listdetail.gia;
      }
      localStorage.setItem("sanpham", 0);
      localStorage.setItem("sanpham", JSON.stringify($scope.listdetail));
      $http({
        method: "GET",
        // url: "https://localhost:7261/api/SanPham/get-chuyenmuc?chuyenmuc=" + $scope.listdetail.maChuyenMuc,
        url:
          "https://localhost:7165/api/SanPham/get-chuyenmuc?chuyenmuc=" +
          $scope.listdetail.maChuyenMuc,
      }).then(function (response) {
        $scope.detailitem = response.data;
        var index = $scope.detailitem.findIndex(
          (item) => item.maSanPham === $scope.listdetail.maSanPham
        );

        if (index !== -1) {
          // Nếu tồn tại, xóa phần tử có maSanPham tương ứng
          $scope.detailitem.splice(index, 1);
          // console.log($scope.detailitem)
        }
      });
    });
  };
  $scope.Detail();

  $scope.number_sales = function (product) {
    return ((product.gia - product.giaGiam) / product.gia) * 100;
  };

  // lấy giá của sản phẩm
  $scope.Totallist = function () {
    $scope.totallist = 0;
    for (var i = 0; i < $scope.list.length; i++) {
      var product = $scope.list[i];
      product.tongTien = product.soLuong * product.giacart;
      $scope.totallist += product.tongTien;
    }

    return $scope.total;
  };

  // thêm sản phẩm vào giỏ hàng  của tường khách hàng
  $scope.sum = 0;

  var customerId = 0;
  customerId = JSON.parse(localStorage.getItem("newcart"))[0].maTaiKhoan;
  $scope.listCart = function () {
    var data = {
      maSanPham: JSON.parse(localStorage.getItem("sanpham")).maSanPham,
      tenSanPham: JSON.parse(localStorage.getItem("sanpham")).tenSanPham,
      anhDaiDien: JSON.parse(localStorage.getItem("sanpham")).anhDaiDien,
      soLuong: $scope.numbersp,
      gia: $scope.giacart,
    };

    console.log(data);
    updateCart(customerId, data);
  };

  // Hàm lưu thông tin giỏ hàng vào Local Storage
  $scope.saveCart = function (customerId, cart) {
    var cartKey = "cartItem_" + customerId;
    localStorage.setItem(cartKey, JSON.stringify(cart));
  };

  // Hàm tìm kiếm một sản phẩm trong giỏ hàng
  function findCartItem(cart, productId) {
    for (var i = 0; i < cart.length; i++) {
      if (cart[i].maSanPham === productId) {
        return cart[i];
      }
    }
    return null;
  }

  // Hàm cập nhật giỏ hàng
  function updateCart(customerId, data) {
    var cartItems =
      JSON.parse(localStorage.getItem("cartItem_" + customerId)) || [];

    if (!Array.isArray(cartItems)) {
      cartItems = [];
    }

    var existingItem = findCartItem(cartItems, data.maSanPham);

    if (existingItem) {
      existingItem.soLuong += data.soLuong;
    } else {
      cartItems.push(data);
    }

    // alert('Thêm thành công');
    localStorage.setItem("cartItem_" + customerId, JSON.stringify(cartItems));
    $scope.list = cartItems;
    alert("Thêm thành công");
    console.log($scope.list);

    if (localStorage.getItem("cartItem_" + customerId)) {
      $scope.list = [];
      $scope.list = JSON.parse(localStorage.getItem("cartItem_" + customerId));
    }
  }

  // hiển thị thông tin sau khi load lại trang

  if (localStorage.getItem("cartItem_" + customerId)) {
    $scope.list = [];
    $scope.list = JSON.parse(localStorage.getItem("cartItem_" + customerId));
    // console.log($scope.list)
    var cartItems = localStorage.getItem("cartItem_" + customerId);
    var parsedCartItems = JSON.parse(cartItems) || [];
    $scope.sum = parsedCartItems.length;
  }

  // hàm xóa
  $scope.removeItem = function (item) {
    // Tìm vị trí của sản phẩm trong danh sách
    var index = $scope.list.indexOf(item);

    // Nếu sản phẩm tồn tại trong danh sách, xóa nó
    if (index !== -1) {
      $scope.list.splice(index, 1);

      // Cập nhật lại localStorage sau khi xóa
      localStorage.setItem(
        "cartItem_" + customerId,
        JSON.stringify($scope.list)
      );
      $scope.list = JSON.parse(localStorage.getItem("cartItem_" + customerId));
      // cập nhật lại tổng tiên fsau khi xóa
      // $scope.calculateTotalAllProducts();
    }
  };

  // hàm tính tông r tiền 1 sản phẩm
  $scope.calculateTotal = function (item) {
    return item.soLuong * item.gia;
  };

  // update lại khi thay đổi số lượng
  $scope.updateQuantity = function (item, newQuantity) {
    // Tìm vị trí của sản phẩm trong danh sách
    var index = $scope.list.indexOf(item);

    // Nếu sản phẩm tồn tại trong danh sách, cập nhật số lượng mới
    if (index !== -1) {
      $scope.list[index].soLuong = newQuantity;

      // Cập nhật lại localStorage sau khi cập nhật số lượng
      localStorage.setItem(
        "cartItem_" + customerId,
        JSON.stringify($scope.list)
      );
    }
  };

  // tính tổng tiền khi sản phẩm được check box
  $scope.calculateSelectedTotal = function () {
    var total = 0;
    angular.forEach($scope.list, function (item) {
      if (item.isSelected) {
        total += $scope.calculateTotal(item);
      }
    });
    return total;
  };

  // lấy thông tin sản phẩm khki được checkbox
  $scope.selectedItems = [];
  $scope.toggleSelection = function (item) {
    if (item.isSelected) {
      $scope.selectedItems.push(item);
      // console.log($scope.selectedItems)
      localStorage.setItem("productbill", JSON.stringify($scope.selectedItems));
    } else {
      var index = $scope.selectedItems.indexOf(item);
      if (index !== -1) {
        $scope.selectedItems.splice(index, 1);
      }
      localStorage.setItem("productbill", JSON.stringify($scope.selectedItems));
    }
    // localStorage.setItem('productbill', JSON.stringify($scope.selectedItems));
  };
});

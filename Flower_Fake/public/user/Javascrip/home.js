
var header = document.querySelector(".header-list");

// Xử lý sự kiện cuộn trang
window.addEventListener("scroll", function() {
    if (window.pageYOffset > 5) {
        // Khi người dùng cuộn xuống đủ xa, hiển thị header
        header.style.position = "fixed"; // Đặt position thành fixed
        header.style.top = "0";
        header.style.left = "0";
        header.style.right = "0";
    } else {
       
        header.style.position = "";
        
    }
});

// header-list-item
function renderProducts(productlist , product){
    // const productlist = document.querySelector('.list-brithday-2');
    product.forEach((product) =>{
    const productItem = document.createElement("li");
    productItem.classList.add("list-brithday__item");
    const productImage =document.createElement("a");
    productImage.textContent =product.name;
    productImage.href =product.link;
    productItem.appendChild(productImage);
    productlist.appendChild(productItem);
});
}
//  list-brithday-1
const product = [
    {
        id:1,
        name: "Hoa sinh nhật sang trọng",
        link: "/html/product.html"
        
    },

    {
        id:2,
        name: "Hoa sinh nhật giá rẻ",
        link: "/html/product.html"
    },

    {
        id:3,
        name: "Hoa tặng sinh nhật người yêu  ",
        link: "/html/product.html"
    },

    {
        id:4,
        name: "Hoa tặng sinh nhật mẹ",
        link: "/html/product.html"
    },

    {
        id:5,
        name: "Hoa tặng sinh nhật bạn",
        link: "/html/product.html"
    },
    {
        id:6,
        name: " lẵng Hoa tặng sinh nhật ",
        link: "/html/product.html"
    },
    {
        id:7,
        name: "Hoa hồng tặng sinh nhật",
        link: "/html/product.html"
    },
    {
        id:8,
        name: "giỏ hoa tặng sinh nhật",
        link: "/html/product.html"
    },
    
]
const productList_1 =document.querySelector(".list-brithday-1")
renderProducts(productList_1,product);

//  list-brithday-2

const product_2 = [
    {
        id:1,
        name: "hoa khai trương để bàn",
        link: "/html/product.html"
    },

    {
        id:2,
        name: "kệ hoa khai trương",
        link: "/html/product.html"
    },

    {
        id:3,
        name: "kệ hoa khai trương hiện đại  ",
        link: "/html/product.html"
    },

    {
        id:4,
        name: "hoa khai trương giá rẻ",
        link: "/html/product.html"
    },

    {
        id:5,
        name: "lẵng hoa 2 tầng mừng khai trương",
        link: "/html/product.html"
    },
    
]
const productlist_2 = document.querySelector('.list-brithday-2');
renderProducts(productlist_2 , product_2);

//  list-brithday-3
const product_3 = [
    {
        id:1,
        name: "Hoa chúc mừng ",
        link: "/html/product.html"
    },

    {
        id:2,
        name: "Hoa cưới cầm tay",
        link: "/html/product.html"
    },

    {
        id:3,
        name: "Hoa tang lễ - hoa chia buồn  ",
        link: "/html/product.html"
    },

    {
        id:4,
        name: "Hoa tình yêu",
        link: "/html/product.html"
    },

    {
        id:5,
        name: "Hoa valentin",
        link: "/html/product.html"
    },
    {
        id:6,
        name: " hoa kỉ niệm ngày cưới ",
        link: "/html/product.html"
    },
    {
        id:7,
        name: "ngày của mẹ",
        link: "/html/product.html"
    },
    {
        id:8,
        name: "hoa chúc mừng 8-3",
        link: "/html/product.html"
    },
    {
        id:9,
        name: "hoa chúc mừng 20-10",
        link: "/html/product.html"
    },
    {
        id:10,
        name: "ngày nhà giáo VN",
        link: "/html/product.html"
    },
    {
        id:11,
        name: "giáng sinh",
        link: "/html/product.html"
    },
    {
        id:12,
        name: "tết âm lịch",
        link: "/html/product.html"
    },
    {
        id:13,
        name: "hoa tốt nghiệp",
        link: "/html/product.html"
    },
    {
        id:14,
        name: "hoa định kỳ",
        link: "/html/product.html"
    },
    
]
const productList_3 =document.querySelector(".list-brithday-3")
renderProducts(productList_3,product_3);

//  list-brithday-4
const product_4 = [
    {
        id:1,
        name: "bó hoa ",
        link: "/html/product.html"
    },

    {
        id:2,
        name: "lẵng hoa",
        link: "/html/product.html"
    },

    {
        id:3,
        name: "giỏ hoa  ",
        link: "/html/product.html"
    },

    {
        id:4,
        name: "kệ hoa",
        link: "/html/product.html"
    },

    {
        id:5,
        name: "hộp hoa",
        link: "/html/product.html"
    },
    {
        id:6,
        name: " bình hoa",
        link: "/html/product.html"
    },
    
]

const productList_4 =document.querySelector(".list-brithday-4")
renderProducts(productList_4,product_4);

//  list-brithday-5
const product_5 = [
    {
        id:1,
        name: "Hoa hồng ",
        link: "/html/product.html"
    },

    {
        id:2,
        name: "Hoa baby",
        link: "/html/product.html"
    },

    {
        id:3,
        name: "Hoa hướng dương  ",
        link: "/html/product.html"
    },

    {
        id:4,
        name: "Hoa lan hồ điệp",
        link: "/html/product.html"
    },

    {
        id:5,
        name: "Hoa tulip",
        link: "/html/product.html"
    },
    {
        id:6,
        name: " hoa cúc tana ",
        link: "/html/product.html"
    },
    {
        id:7,
        name: "hoa thạch thảo",
        link: "/html/product.html"
    },
    {
        id:8,
        name: "hoa mẫu đơn",
        link: "/html/product.html"
    },
    {
        id:9,
        name: "cúc mẫu đơn",
        link: "/html/product.html"
    },
    {
        id:10,
        name: "hoa cẩm tú cầu",
        link: "/html/product.html"
    },
    {
        id:11,
        name: "hoa ly",
        link: "/html/product.html"
    },
    {
        id:12,
        name: "hoa sen",
        link: "/html/product.html"
    },
    {
        id:13,
        name: "hoa đống tiền",
        link: "/html/product.html"
    },
    {
        id:14,
        name: "hoa cẩm chướng",
        link: "/html/product.html"
    },
    {
        id:14,
        name: "hoa cúc họa mi",
        link: "/html/product.html"
    },
    
]

const productList_5 =document.querySelector(".list-brithday-5")
renderProducts(productList_5,product_5);

//  list-brithday-6
const product_6 = [
    {
        id:1,
        name: "gấu bông  ",
    },

    {
        id:2,
        name: "Socola",
    },

    {
        id:3,
        name: "bánh kem  ",
    },

    {
        id:4,
        name: "giỏ trái cây",
    },

    {
        id:5,
        name: "giỏ quà tặng",
    },
    {
        id:6,
        name: " quà lưu niệm",
        
    },
    
]

const productList_6 =document.querySelector(".list-brithday-6")
renderProducts(productList_6,product_6);

// slider

function toggleSlider() {
    const sliderItems = document.querySelectorAll('.slider-item');
    let currentIndex = 0;
    setInterval(() => {
      sliderItems[currentIndex].style.display = 'none';
      currentIndex = (currentIndex + 1) % sliderItems.length;
      sliderItems[currentIndex].style.display = 'block';
    }, 2000);
  }
  toggleSlider(); 

//    sự kiện click button
const rightButton = document.querySelector(".button-right");
const leftButton = document.querySelector(".button-left");
const sliderItems = document.querySelectorAll('.slider-item');
let currentIndex = 0;

rightButton.addEventListener('click', function () {
    sliderItems[currentIndex].style.display = 'none';
    currentIndex = (currentIndex + 1) % sliderItems.length;
    sliderItems[currentIndex].style.display = 'block';
});

leftButton.addEventListener('click', function () {
    sliderItems[currentIndex].style.display = 'none';
    currentIndex = (currentIndex - 1 + sliderItems.length) % sliderItems.length;
    sliderItems[currentIndex].style.display = 'block';
});
//    flower-list

// // Tạo một hàm để thêm một sản phẩm vào danh sách sản phẩm
// function addProductToContainer(containerId, product_list) {
//     // Tìm đối tượng chứa sản phẩm bằng cách sử dụng containerId
//     const container = document.querySelector(`.${containerId}`);
  
//     // Tạo một phần tử sản phẩm mới
//     const productItem = document.createElement("div");
//     productItem.classList.add("flower-items","col", "l-3", "m-4", "c-6");
  
//     // product_sale.map((product) => {

//     // })
//     // Tạo nội dung cho phần tử sản phẩm 
//     const productContent = `
//       <div class="img-flower">
//         <img class="img" src="${product_list.image}" alt="${product.name}">
//       </div>
//       <div class="text-flower">
//         <p class="name-flower">${product_list.name}</p>
//         <span class="price-sale">${product_list.salePrice}</span>
//         <span class="price">${product_list.price}</span>
//       </div>
//       <div class="sub-item">
//         <a href="${product_list.link}">
//           Đặt hàng
//         </a>
//       </div>
//     `;
//     // Gán nội dung cho phần tử sản phẩm
//     productItem.innerHTML = productContent;
//     // Thêm phần tử sản phẩm vào danh sách sản phẩm
//     container.appendChild(productItem);
//   }
  
//   // Định nghĩa nhiều sản phẩm
//   const product_sale = [
//     {
       
//         name: "Mặt trời của anh ",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp",
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//     {
        
//         name: "Mặt trời của anh ",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },

//     {
//         name: "Mặt trời của anh ",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },

//     {
        
//         name: "Mặt trời của anh ",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//   ]
//   // duyệt qua vòng lặp để thêm sản phẩm
//  for (const product of product_sale) {
//     addProductToContainer("flower-item", product);
//   }

// // sản phẩm đặt nhiều nhất
//   const product_sale_1 = [
//     {
       
//         name: "Little Tana",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp",
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//     {
        
//         name: "Baby nhỏ xinh",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },

//     {
//         name: "Simple",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },

//     {
//         name: "Khoe Sắc",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//     {
//         name: "Khoe Sắc",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//     {
//         name: "Khoe Sắc",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//     {
//         name: "Khoe Sắc",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//     {
//         name: "Khoe Sắc",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
    
//   ]
//   for (const product of product_sale_1) {
//     addProductToContainer("flower-item-1", product);
//   }

//   // sản phẩm mới
//   const product_sale_2 = [
//     {
       
//         name: "Little Tana",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp",
//         price: "500,000VND",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//     {
        
//         name: "Baby nhỏ xinh",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "",
//         salePrice: "300,000VND",
//         link: "#"

//     },

//     {
//         name: "Simple",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "",
//         salePrice: "300,000VND",
//         link: "#"

//     },

//     {
//         name: "Khoe Sắc",
//         image: "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/New%20Sep/mat-troi-cua-anh-271x271.jpg.webp" ,
//         price: "",
//         salePrice: "300,000VND",
//         link: "#"

//     },
//   ]
//   for (const product of product_sale_2) {
//     addProductToContainer("flower-item-2", product);
//   }

//    khách hàng đặt nhiều 

// Chọn phần tử cha "flower-custom-icon"
const flowerCustomIcon = document.querySelector('.flower-custom-icon');

// Mảng chứa các đường dẫn hình ảnh
const imageSources = [
  "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/common/partner/6-130x130.png.webp",
  "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/common/partner/2-130x130.png.webp",
  "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/common/partner/8-130x130.png.webp",
  "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/common/partner/9-130x130.png.webp",
  "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/common/partner/5-130x130.png.webp",
  "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/common/partner/4-130x130.png.webp",
  "https://8384f55340.vws.vegacdn.vn/image/cache/catalog/common/partner/3-130x130.png.webp",
  
];

// Tạo các phần tử và gắn vào phần tử cha
for (const src of imageSources) {
  const customIcon = document.createElement('div');
  customIcon.classList.add('custom-icon', 'l-2-4');

  const img = document.createElement('img');
  img.src = src;
  img.alt = "ảnh logo khách hàng mua nhiều nhất";

  customIcon.appendChild(img);
  flowerCustomIcon.appendChild(customIcon);
}


// slider custom 
// function toggleSlider() {
//     const sliderItems = document.querySelectorAll('.custom-icon');
//     let currentIndex = 0;
    
        
//         setInterval(() => {
//           sliderItems[currentIndex].style.display = 'none';
//           currentIndex = (currentIndex + 1) % sliderItems.length;
//           sliderItems[currentIndex].style.display = 'block';
//         }, 2000);
//     }
  
  toggleSlider(); 



/////// phần API


// var app = angular.module('AppBanHang', []);

// app.controller("HomeCtrl", function ($scope, $http) {
// $scope.listItem = [];
	 
//     $scope.GetBanChay= function () {
//         $http({
//             method: 'GET',
//             url: current_url + '/api/SanPham/get-all',
//         }).then(function (response) {  
           
//             $scope.listItem = response.data;  
//         });
//     };   
// 	$scope.GetBanChay();
// });
    
  





<?php

include 'pdo/connect.php';
include 'pdo/wishlist_cart.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HOME</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>
<?php include 'pdo/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home_shoe_1.png" alt="" opacity="30">
         </div>
         <div class="content">
            <span>Order Now</span>
            <h3>Our Latest Shoes</h3>
            <a href="shop.php" class="orange-button"><b>Click Now</b></a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/home_shoe_2.png" alt="">
         </div>
         <div class="content">
            <span>Most Popular</span>
            <h3>New Shoes from the block</h3>
            <a href="shop.php" class="orange-button"><b>Click Now</b></a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading" style="color: white;">shop by category</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=Nike" class="swiper-slide slide">
      <img src="images/category_1.png" 
      alt="" >
      <h3>Nike</h3>
   </a>

   <a href="category.php?category=Adidas" class="swiper-slide slide">
      <img src="https://www.freepnglogos.com/uploads/adidas-logo-png-black-0.png" >
      <h3>Adidas</h3>
   </a>

   <a href="category.php?category=New Balance" class="swiper-slide slide">
      <img src="images/R.png" alt="">
      <h3>New Balance</h3>
   </a>

   <a href="category.php?category=Converse" class="swiper-slide slide">
      <img src="https://th.bing.com/th/id/OIP.zSYdllsGWCSC_1bST3ShTwHaE_?pid=ImgDet&rs=1" alt="">
      <h3>Converse</h3>
   </a>

   <a href="category.php?category=Vans" class="swiper-slide slide">
      <img src=https://th.bing.com/th/id/OIP.bMoWzsmCJyCKEC42jwFEuAHaC_?pid=ImgDet&rs=1" alt="">
      <h3>Vans</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section style="color: white;">
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6" style="border:8px solid 
#ddd">
      <img src="images/logo_2.png" alt="responsive webite" class="img-fluid" width="1300" height="600" href="about.php">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6" style="border:10px solid 
#ddd">
      <h1><b>What is Sneaker Crib?</b></h1><br>
      <p style="font-size: 21px">Sneaker Crib Philippines, the top online shopping in the country, has made several contributions 
         to the growing e-commerce community in the Philippines, creating an avenue for sellers to promote their shoes online. 
         Sneaker Crib will continue its growth for the quality of service, constantly expanding our assortment of categories and 
         offering convenient payment options and delivery anywhere in the country.
      </p>
      <p style="font-size: 21px">Sneaker Crib's Logo symbolizes guidance towards new and old consumers in the world of shoes. Our vision is to provide a wide array of shoes
         while providing top service and opportunities for sellers and consumers. 
      </p>
    </div>
  </div>
</div>
</section>


<section class="home-products">

   <h1 class="heading" style="color: white;">Just For You</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>₱</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>



<?php include 'pdo/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>
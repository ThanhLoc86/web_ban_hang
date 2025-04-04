<?php include 'app/views/shares/header.php'; ?>
<!-- Bao gồm phần đầu trang -->

<!-- Banner toàn màn hình -->
<div class="banner">
    <h2 style="text-align: center; color: #fff; margin-top: -20px; ">Cửa Hàng Công Nghệ</h2>
    <div class="tranding-slider swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="car-card">
                    <img src="uploads/IP16.PNG" alt="IPhone">
                    <div class="car-info">
                        <h3>IPhone</h3>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <div class="car-card">
                    <img src="uploads/Laptop.PNG" alt="Laptop">
                    <div class="car-info">
                        <h3>Laptop</h3>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
                <div class="car-card">
                    <img src="uploads/MayTinhBang.PNG" alt="MayTinhBang">
                    <div class="car-info">
                        <h3>Máy Tính Bảng</h3>
                    </div>
                </div>
            </div>
            <!-- Slide 4 -->
            <div class="swiper-slide">
                <div class="car-card">
                    <img src="uploads/PhuKienDT.PNG" alt="PhuKienDT">
                    <div class="car-info">
                        <h3>Phụ kiện điện thoại</h3>
                    </div>
                </div>
            </div>
            <!-- Slide 5 -->
            <div class="swiper-slide">
                <div class="car-card">
                    <img src="uploads/ThietBiAmThanh.PNG" alt="ThietBiAmThanh">
                    <div class="car-info">
                        <h3>Thiết bị âm thanh</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <style>
        .banner {
            margin-top: 10px;
            padding: 40px 10px;
            background-color: rgb(85, 92, 99);
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .swiper-wrapper {
            display: flex;
            gap: 5px;
        }

        .swiper-slide {
            flex: 1;
            overflow: hidden;
            cursor: pointer;
            width: 200px;
            height: 300px;
            transition: flex 0.3s ease-in-out;
            border-radius: 10px;
        }

        .swiper-slide:hover {
            flex: 3;
        }

        .car-card {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease;
        }

        .car-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
         /*   filter: grayscale(1); */`
           /* -webkit-filter: grayscale(1); */
            transition: filter 0.3s ease-in-out;
        }

        .swiper-slide:hover .car-card img {
            filter: none;
        }

        .car-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 15px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            text-align: center;
        }

        .car-info h3 {
            margin: 0;
            font-size: 18px;
        }
    </style>
</div>



<!-- Phần sản phẩm -->
<h1 style="text-align: center; margin: 40px 0; font-size: 36px;">Danh sách sản phẩm</h1>
<?php if (SessionHelper::isAdmin()): ?>
<a href="/web_ban_hang/Product/add" class="btn btn-add-custom btn-secondary mb-2"
    style="display: block; width: 300px; margin: 0 auto; font-size: 18px; background-color: #555; color: #fff; border: none; border-radius: 20px">
    + Thêm sản phẩm mới</a>
<?php endif; ?>
<div style="display: flex; flex-wrap: wrap; justify-content: center; max-width: 1500px; margin: 0 auto;">
    <?php foreach ($products as $product): ?>
        <div style="flex: 0 1 calc(33.33% - 40px); margin: 20px; " >
            <div class="list-group-item"
                style="border: 2px solid #34495e; border-radius: 8px; padding: 10px; background-color: #ecf0f1; height: 100%; ">
                <h2 style="font-size: 28px; margin-bottom: 10px;"><a
                        href="/web_ban_hang/Product/show/<?php echo $product->id; ?>"
                        style="text-decoration: none; color: #2c3e50;">
                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </h2>

                <?php if ($product->image): ?>
                    <div style="text-align: center;" >
                        <img class="img-custom" src="/web_ban_hang/<?php echo $product->image; ?> "  alt="Product Image"
                            style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
                    </div>
                <?php endif; ?>
                <!-- <p style="font-size: 18px; margin: 10px 0;">
                    <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                </p> -->

                <p style="color:cornflowerblue ;font-size: 20px; font-weight: bold;">Giá:
                    <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> USD
                </p>

                <p style="font-size: 18px;">Danh mục:
                    <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <div style="margin-top: 10px; " class="d-flex justify-content-between">
                    <?php if (SessionHelper::isAdmin()): ?>
                    <a href="/web_ban_hang/Product/edit/<?php echo $product->id; ?>" class="btn btn-secondary-edit"
                        style="margin-right: 10px; padding: 10px 20px; font-size: 20px; background-color: #555; color: #fff; border: none;border-radius:15px;">Sửa</a>
                    <a href="/web_ban_hang/Product/delete/<?php echo $product->id; ?>" class="btn btn-secondary-delete"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"
                        style="padding: 10px 20px; font-size: 20px; background-color: #555; color: #fff; border: none; border-radius:15px;">Xóa</a>
                    <?php endif; ?>
                  
                        <a href="/web_ban_hang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-add-to-store "
                        style="padding: 10px 20px; font-size: 20px; background-color: #555; color: #fff; border: none; border-radius:15px; margin-left: 10px;">🛒</a>
                    </div>
                

            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .btn-add-custom:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        transform: scale(1.1);
    }

    .img-custom:hover {
        border: 1px solid black;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 1);
        transform: scale(1.1);
        transition: filter 0.3s ease-in-out;
        /* transition: flex 0.3s ease-in-out; */
    }

    .btn-secondary-edit:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        background-color: cadetblue;
    }

    .btn-secondary-delete:hover {
        transform: scale(1.1);
        /*background-color:rgb(85, 92, 99);*/
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        background-color: darkred;
    }

    .btn-add-to-store:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        /* background-color: cadetblue; */
    }
</style>
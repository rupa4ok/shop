<?php
require_once (ROOT.'/views/parts/head.php');
require_once (ROOT.'/views/parts/header.php');
require_once (ROOT.'/views/parts/leftmenu.php');
?>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>

                            <?php foreach ($categoryProducts as $product): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $product['image']; ?>" alt="" />
                                                <h2><?php echo $product['price'] . 'руб'; ?></h2></a>
                                                <a href="/product/<?php echo $product['id']; ?>"><p><?php echo $product['name']; ?></p>
                                                <a href="/product/<?php echo $product['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if($product['is_new']): ?>
                                                <img src="/template/images/home/new.png" class="new" alt="<?php echo $product['name']; ?>"/>
                                             <?php endif; ?>
                                                                      </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php
require_once (ROOT.'/views/parts/footer.php');
require_once (ROOT.'/views/parts/scripts.php');
?>
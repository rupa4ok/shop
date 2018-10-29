<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $cat): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="<?php echo '/category/' . $cat['id']; ?>" class="<?php if ($categoryId == $cat['id']) echo 'active'; ?>">
                                            <?php echo $cat['name']; ?>
                                        </a></h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                
                </div>
            </div>
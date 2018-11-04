<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 31.10.2018
 * Time: 21:01
 */

require_once (ROOT.'/views/parts/head.php');
require_once (ROOT.'/views/parts/header.php');
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="signup-form">
                    <h2>Кабинет пользователя</h2>
                    <h3>Привет, <?php echo $user['name'] ?></h3>
                    <ul>
                        <li><a href="/cabinet/edit">Редактрировать данные</a></li>
                        <li><a href="/cabinet/history">Список покупок</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once (ROOT.'/views/parts/footer.php');
require_once (ROOT.'/views/parts/scripts.php');
?>

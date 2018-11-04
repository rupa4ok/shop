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
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($results): ?>
                <p>Вы зарегистрированы</p>
                <?php endif; ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <? endif; ?>
                <div class="signup-form">
                    <h2>Регистрация на сайте</h2>
                    <form action="#" method="POST">
                        <input type="text" name="name" value="<?php echo $name?>" placeholder="Имя">
                        <input type="email" name="email" value="<?php echo $email?>" placeholder="E-MAIL">
                        <input type="password" name="password" value="<?php echo $password?>" placeholder="Пароль">
                        <button type="submit" name="submit" class="btn btn-default">Регистрация</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once (ROOT.'/views/parts/footer.php');
require_once (ROOT.'/views/parts/scripts.php');
?>

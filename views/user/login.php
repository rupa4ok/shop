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
                    <h2>Вход на сайт</h2>
                    <form action="#" method="POST">
                        <input type="email" name="email" value="<?php echo $email?>" placeholder="E-MAIL">
                        <input type="password" name="password" value="<?php echo $password?>" placeholder="Пароль">
                        <button type="submit" name="submit" class="btn btn-default">Войти</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <a href="/user/register/">Зарегестрироваться на сайте</a>
            </div>
        </div>
    </div>
</section>

<?php
require_once (ROOT.'/views/parts/footer.php');
require_once (ROOT.'/views/parts/scripts.php');
?>

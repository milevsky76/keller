<?php if($arrResult["auth"]["isAuth"]){ ?>
    <div class="user-menu__logged">
        <p><?= $arrResult["auth"]["name"];?>&#8195</p>
    </div>
    <form action="" method="POST" class="logout">
        <input class="btn-logout" type="submit" name="logout" value="Logout" />
    </form>
<?php } else { ?>
    <a href="#" data-toggle="modal" data-target="#loginSignupModal" data-target-sub="#login">Login</a>
    <span>or</span>
    <a href="#" data-toggle="modal" data-target="#loginSignupModal" data-target-sub="#signup">Sign up</a>
<?php } ?>
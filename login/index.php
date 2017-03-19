<?php

include_once '../lib/flash_messages.php';
include_once '../lib/db_queries.php';
require_once  '../lib/auth_check.php';

redirect_if_user_auth();

?>
<html>
    <head>
        <title>
            Nata`s site.
        </title>
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <form method="post" action="user_auth.php" class="form-horizontal col-md-6 col-md-offset-3">
                    <h2>Форма входу</h2>
                    <?php if(flash_exists('message')):?>
                        <div class="form-group">
                            <div class="alert alert-danger col-md-offset-2">
                                <?php echo show_flash_message('message');?>
                            </div>
                        </div>
                    <?php endif?>
                    <div class="form-group">
                        <label for="login" class="col-sm-2 control-label">Логін</label>
                        <div class="col-sm-10">
                            <input type="text" name="login" class="form-control" id="login" placeholder="Ваш логін..."/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Ваш пароль..."/>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-danger col-md-2 col-md-offset-10" value="Вхід"/>
                </form>
            </div>
        </div>
    </body>
</html>
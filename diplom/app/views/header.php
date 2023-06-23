<! DOCTYPE html>

<html>
    <head>
        <script>
            window.BASE_DIR_AJAX = "<?= BASE_DIR_AJAX ?>";
        </script>
        <title>
            <?= $this->getTitle(); ?>
        </title>
        <meta charset="UTF-8"/>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.cdnfonts.com/css/chirp-2" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <link rel="apple-touch-icon" sizes="57x57" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= TEMPLANE_PATH ?>/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= TEMPLANE_PATH ?>/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= TEMPLANE_PATH ?>/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= TEMPLANE_PATH ?>/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= TEMPLANE_PATH ?>/icon/favicon-16x16.png">
        <link rel="manifest" href="<?= TEMPLANE_PATH ?>/icon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= TEMPLANE_PATH ?>/icon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link href="<?= TEMPLANE_PATH ?>/style.css?<?= rand() ?>" rel="stylesheet"/>
        <link href="<?= TEMPLANE_PATH ?>/css/preloader.css" rel="stylesheet"/>
        <script src="<?= TEMPLANE_PATH ?>/script.js?<?= rand() ?>"></script>

        <? if (isset($this->addjs)): ?>
            <script type="text/javascript" src="<?= $this->addjs ?>?<?= rand(100, 1000000) ?>"></script>
        <? endif ?>
        <? if (isset($this->addcss)): ?>
            <link rel="stylesheet" href="<?= $this->addcss ?>?<?= rand(100, 1000000) ?>">
        <? endif ?>

        <--#ADD_CSS_PATHS#-->

        <--#ADD_JS_PATHS#-->

    </head>
    <body>
        <div class="wrapper" style="display: flex; flex-direction: column; flex: 1;">
            <nav class="navbar navbar-expand-md"> 
                <div class="container-fluid"> 
                    <div class="header d-flex justify-content-between align-items-center" id="main"> 
                        <div class="normal">
                            <ul class="navbar-nav me-auto d-flex align-items-center"> 
                                <li class="nav-item"> 
                                    <? if (Libs\User::isLogin()): ?> 
                                        <a class="nav-link active" aria-current="page" href="<?= MAIN_PREFIX ?>/reg/logout/">
                                            <div style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
                                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                                                </svg>
                                            </div>
                                            <div>Выйти</div>
                                        </a> 
                                    <? else : ?> 
                                        <a class="nav-link active" aria-current="page" href="javascript:;" onclick="openDialogLogin()">
                                            <div style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                                                </svg>
                                            </div>
                                            <div>Войти</div>
                                        </a> 
                                    <? endif; ?> 
                                </li> 
                                <li class="nav-item"> 
                                    <? if (Libs\User::isAdmin()): ?> 
                                        <a class="nav-link active" href="<?= MAIN_PREFIX ?>/admin/">
                                            <div style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                                                </svg>
                                            </div>
                                            <div>Админка</div>
                                        </a> 
                                    <? endif; ?> 
                                </li> 
                                <li class="nav-item"> 
                                    <? if (!Libs\User::isLogin()): ?> 
                                        <a class="nav-link active" aria-current="page" href="javascript:;" onclick="openDialogReg()">
                                            <div style="text-align: center;">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                    <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                              </svg>
                                            </div>
                                            <div>Регистрация</div>
                                        </a> 
                                    <? endif; ?> 
                                </li> 
                                <li class="nav-item"> 
                                    <? if (Libs\User::isLogin()): ?> 
                                        <a class="nav-link active" href="<?= MAIN_PREFIX ?>/lk/">
                                        <div style="text-align: center;">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
                                              </svg>
                                            </div>
                                            <div><?= \Libs\User::getLogin() ?></div>
                                        </a> 
                                    <? endif; ?> 
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link active" href="<?= MAIN_PREFIX ?>/cartitems/">
                                        <div style="text-align: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                            </svg>
                                        </div>
                                        <div>Корзина</div>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link active" href="<?= MAIN_PREFIX ?>/fav/">
                                        <div style="text-align: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bookmark-heart" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"/>
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                            </svg>
                                        </div>
                                        <div>Избранное</div>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link active" href="<?= MAIN_PREFIX ?>/catalog/">
                                        <div style="text-align: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                                            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                            </svg>
                                        </div>
                                        <div>Каталог</div>
                                    </a> 
                                </li>
                            </ul> 
                        </div>
                        <div class="width800">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Меню
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li class="nav-item"> 
                                    <? if (Libs\User::isLogin()): ?> 
                                        <a class="nav-link active" aria-current="page" href="<?= MAIN_PREFIX ?>/reg/logout/">
                                            <div>Выйти</div>
                                        </a> 
                                    <? else : ?> 
                                        <a class="nav-link active" aria-current="page" href="javascript:;" onclick="openDialogLogin()">
                                            <div>Войти</div>
                                        </a> 
                                    <? endif; ?> 
                                </li> 
                                <li class="nav-item"> 
                                    <? if (Libs\User::isAdmin()): ?> 
                                        <a class="nav-link active" href="<?= MAIN_PREFIX ?>/admin/">
                                            <div>Админка</div>
                                        </a> 
                                    <? endif; ?> 
                                </li> 
                                <li class="nav-item"> 
                                    <? if (!Libs\User::isLogin()): ?> 
                                        <a class="nav-link active" aria-current="page" href="javascript:;" onclick="openDialogReg()">
                                            <div>Регистрация</div>
                                        </a> 
                                    <? endif; ?> 
                                </li> 
                                <li class="nav-item"> 
                                    <? if (Libs\User::isLogin()): ?> 
                                        <a class="nav-link active" href="<?= MAIN_PREFIX ?>/lk/">
                                            <div><?= \Libs\User::getLogin() ?></div>
                                        </a> 
                                    <? endif; ?> 
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link active" href="<?= MAIN_PREFIX ?>/cartitems/">
                                        <div>Корзина</div>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link active" href="<?= MAIN_PREFIX ?>/fav/">
                                        <div>Избранное</div>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link active" href="<?= MAIN_PREFIX ?>/catalog/">
                                        <div>Каталог</div>
                                    </a> 
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </nav>

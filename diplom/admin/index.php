<? use Libs\App;

require_once __DIR__ . '/../app/libs/Bootstrap.php';

if (Libs\User::isLogin() && Libs\User::isAdmin()) {
    $app = new App('/admin/');
} else {
    header("location: " . MAIN_PREFIX . '/');
} ?>


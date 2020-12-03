<?php // @codingStandardsIgnoreFile
/**
 * This file is part of Pico. It's copyrighted by the contributors recorded
 * in the version control history of the file, available from the following
 * original location:
 *
 * <https://github.com/picocms/pico-composer/blob/master/index.php>
 *
 * SPDX-License-Identifier: MIT
 * License-Filename: LICENSE
 */

// load dependencies
// pico-composer MUST be installed as root package
if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once(__DIR__ . '/vendor/autoload.php');
} else {
    die("Cannot find 'vendor/autoload.php'. Run `composer install`.");
}

require_once(__DIR__ . "/config/config.php");

// instance Pico
$pico = new Pico(
    __DIR__,    // root dir
    'config/',  // config dir
    'plugins/', // plugins dir
    'themes/'   // themes dir
);

// override configuration?
// EDITED, make session info available in twig files by using 'config.session'
// form array which holds all of the names of gallery image files
$pico->setConfig(array(
    'session' => $_SESSION,
    'imageGallery' => array_filter(
        scandir("assets/img/gallery/"), function($inStr) {
            return preg_match("/^[^.]/", $inStr);
        })
));

// ADDED
// change between light/dark theme
if (isset($_GET["action"])) {
    if ($_GET["action"] == "theme") {
    $previousValue = isset($_SESSION["theme"]) ? $_SESSION["theme"] : null;

    if ($previousValue == "dark") {
        unset($_SESSION["theme"]);
    } else {
        $_SESSION["theme"] = "dark";
    }

    $url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
    $url = preg_replace("/index.php\//", "", $url);
    header("Location: $url");
    }

    if ($_GET["action"] == "session_destroy") {

        // //remove PHPSESSID from browser
        // if ( isset( $_COOKIE[session_name()] ) )
        // setcookie( session_name(), "", time()-3600, "/" );
        // //clear session from globals
        // $_SESSION = array();
        //clear session from disk
        session_destroy();
        $url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
        $url = preg_replace("/index.php\//", "", $url);
        header("Location: $url");
    }
}


// run application
echo $pico->run();

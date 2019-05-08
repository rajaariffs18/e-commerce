<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "template/vendor/bootstrap/css/bootstrap.min.css",
        "template/fonts/font-awesome-4.7.0/css/font-awesome.min.css",
        "template/fonts/themify/themify-icons.css",
        "template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css",
        "template/fonts/elegant-font/html-css/style.css",
        "template/vendor/animate/animate.css",
        "template/vendor/css-hamburgers/hamburgers.min.css",
        "template/vendor/animsition/css/animsition.min.css",
        "template/vendor/select2/select2.min.css",
        "template/vendor/daterangepicker/daterangepicker.css",
        "template/vendor/slick/slick.css",
        "template/vendor/lightbox2/css/lightbox.min.css",
        "template/css/util.css",
        "template/css/main.css",
        "css/mystyle.css",
];
public $js = [
        // "template/vendor/jquery/jquery-3.2.1.min.js",
        "template/vendor/animsition/js/animsition.min.js",
        // "template/vendor/bootstrap/js/popper.js",
        // "template/vendor/bootstrap/js/bootstrap.min.js",
        "template/vendor/slick/slick.min.js",
        "template/js/slick-custom.js",
       "template/vendor/parallax100/parallax100.js",
        "template/js/main.js",
    // "data/morris-data.js",
];
public $depends = [
    'yii\web\YiiAsset',
    // 'yii\bootstrap\BootstrapAsset',
];
}

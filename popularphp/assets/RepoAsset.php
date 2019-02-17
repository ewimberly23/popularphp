<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Repo application asset bundle.
 *
 * @author Evan Wimberly <ewimberly23@gmail.com>
 */
class RepoAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'angular.js',
        'js/repo.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}

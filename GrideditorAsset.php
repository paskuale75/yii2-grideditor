<?php
/**
 * @copyright Pasquale Pellicani
 * @author Pasquale Pellicani <pellicanipasquale@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-grideditor
 */
namespace paskuale75\grideditor;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset for the Frontwise/grid-editor JQuery plugin
 * @author Pasquale Pellicani <pellicanipasquale@gmail.com>
 */
class GrideditorAsset extends AssetBundle 
{
    
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'marqu3s\summernote\SummernoteAsset'
    ];

    public function __construct($config = [])
    {
        $config = array_merge([
            'sourcePath' => __DIR__ . '/dist/',
            'js' => [
                'https://cdn.ckeditor.com/4.12.1/basic/ckeditor.js',
                YII_DEBUG ? 'jquery.grideditor.js' : 'jquery.grideditor.min.js'
            ],
            'css' => ['grideditor.css'],
        ], $config);
        parent::__construct($config);
    }
     
}

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
        'marqu3s\summernote\SummernoteAsset',
        'stkevich\yii2-ckeditor5\InlineAssets'
    ];

    public function __construct($config = [])
    {
        $config = array_merge([
            'sourcePath' => __DIR__ . '/dist/',
            'js' => [
                YII_DEBUG ? 'jquery.grideditor.js' : 'jquery.grideditor.min.js'
            ],
            'css' => ['grideditor.css'],
        ], $config);
        parent::__construct($config);
    }
     
}
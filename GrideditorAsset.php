<?php
/**
 * @copyright Pasquale Pellicani
 * @author Pasquale Pellicani <pellicanipasquale@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-grideditor
 */
namespace paskuale75\grideditor;
use yii\web\AssetBundle;
/**
 * Asset for the Frontwise/grid-editor JQuery plugin
 * @author Pasquale Pellicani <pellicanipasquale@gmail.com>
 */
class GridstackAsset extends AssetBundle 
{
    public $sourcePath = 'https://github.com/Frontwise/grid-editor/tree/master/dist/';
    
    public $css = ['grideditor.css'];
    
    public $js = [
        'jquery.grideditor.js',
        'jquery.grideditor.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        //'fedemotta\gridstack\LodashAsset',
    ];
    public function init()
    {        
        $this->js = [YII_ENV_PROD ? 'jquery.grideditor.min.js' : 'jquery.grideditor.js'];
        parent::init();
    }
}
<?php
/**
 * @copyright Pasquale Pellicani
 * @author Pasquale Pellicani <pelicanipasquale@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-grideditor
 */
namespace paskuale75\grideditor;
use yii\web\AssetBundle;
/**
 * Asset for the Frontwise/grid-editor JQuery plugin
 * @author Pasquale Pellicani <pelicanipasquale@gmail.com>
 */
class GridstackAsset extends AssetBundle 
{
    public $sourcePath = '@bower/gridstack';
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'fedemotta\gridstack\LodashAsset',
    ];
    public function init()
    {
        $this->css = [YII_ENV_PROD ? 'dist/gridstack.min.css' : 'dist/gridstack.css'];
        $this->js = [YII_ENV_PROD ? 'dist/gridstack.min.js' : 'dist/gridstack.js'];
        parent::init();
    }
}
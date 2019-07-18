<?php
/**
 * @copyright Pasquale Pellicani
 * @author Pasquale Pellicani <pellicanipasquale@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-grideditor
 */
namespace paskuale75\grideditor;

use yii\base\InvalidCallException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Grideditor.js Yii2 widget
 * @author Pasquale Pellicani <pellicanipasquale@gmail.com>
 */
class Grideditor extends Widget
{

    const EDITOR_TinyMCE = 'TinyMCE';
    const EDITOR_Summernote = 'Summernote';
    const EDITOR_CKEditor = 'CKEditor';


    /**
     * @var string the Rich text editor options
     */
    public $editor = self::EDITOR_Summernote;

    /**
     * @var array the HTML attributes for the widget main container tag.
     */
    public $options = [];
    
    /**
     * @var string the main container tag
     */
    public $tag = 'div';
    
    /**
     * @var array the options for the Grideditor widget.
     */
    public $clientOptions = [];
    
    /**
     * @var the grideditor widgets that are currently active
     */
    private $_widgets = [];
    
    /**
     * Generates a grideditor start tag.
     * @param array $options
     * @param string $tag
     * @return string the generated tag.
     * @see endContainer()
     */
    public static function beginContainer($options=[], $tag='div',$subTag='ul')
    {
        return Html::beginTag($tag,$options);
    }
    /**
     * Generates a grideditor end tag.
     * @param string $tag
     * @return string the generated tag.
     * @see beginContainer()
     */
    public static function endContainer($tag='div')
    {
        return Html::endTag($tag);
    
    }
    /**
     * Generates a grideditor widget begin tag.
     * This method will create a new gridstack widget and returns its opening tag.
     * You should call [[endWidget()]] afterwards.
     * @param array $options
     * @param string $tag
     * @return string the generated tag
     * @see endWidget()
     */
    public function beginWidget($options=[],$tag='div')
    {
        $widget = Html::beginTag($tag,$options);
        $this->_widgets[] = $widget;
        return $widget;
        
    }
    /**
     * Generates a grideditor widget end tag.
     * @param string $tag
     * @return string the generated tag
     * @see beginWidget()
     */
    public function endWidget($tag='div')
    {
        $widget = array_pop($this->_widgets);
        if (!is_null($widget)) {
            return Html::endTag($tag);
        } else {
            throw new InvalidCallException('Mismatching endWidget() call.');
        }
    }
    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        echo self::beginContainer($this->options,$this->tag);
    }
    /**
     * Runs the widget.
     * This registers the necessary javascript code and renders the grideditor close tag.
     * @throws InvalidCallException if `beginWidget()` and `endWidget()` calls are not matching
     */
    public function run()
    {
        if (!empty($this->_widgets)) {
            throw new InvalidCallException('Each beginWidget() should have a matching endWidget() call.');
        }
        $id = $this->options['id'];
        $view = $this->getView();
        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : Json::encode([]);
        GrideditorAsset::register($view);
        $view->registerJs("jQuery('#$id').gridEditor($options);");
        echo self::endContainer($this->tag);
    }
}
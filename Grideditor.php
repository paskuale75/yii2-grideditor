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

    const EDITOR_TinyMCE = 'tinymce';
    const EDITOR_Summernote = 'Summernote';
    const EDITOR_CKEditor = 'ckeditor';


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
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        
    }
    /**
     * Runs the widget.
     * This registers the necessary javascript code and renders the grideditor close tag.
     * @throws InvalidCallException if `beginWidget()` and `endWidget()` calls are not matching
     */
    public function run()
    {
        
        $id = $this->options['id'];
        $view = $this->getView();
        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : Json::encode([]);
        GrideditorAsset::register($view);
        $view->registerJs(
            "$('#$id').gridEditor($options);"
        );
        
    }
}
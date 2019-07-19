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
    const EDITOR_Summernote = 'summernote';
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
     * @var array the options for the internal editor.
     */
    public $editorOptions = [];




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

        $_editorOptions = $this->getEditorOptions();
        $this->options = array_merge($_editorOptions, $this->options);

        parent::init();
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
        $options = !empty($this->options) ? Json::encode($this->options) : Json::encode([]);
        GrideditorAsset::register($view);
        $this->renderDiv();
        $view->registerJs(
            "$('#$id').gridEditor($options);"
        );
    }


    protected function renderDiv()
    {
        $id = $this->options['id'];
        $div  = Html::beginTag('div', ['class' => 'container']);
        $div .= Html::beginTag($this->tag, ['id' => $id]);
        $div .= Html::endTag($this->tag);
        $div .= Html::endTag('div');
        echo $div;
    }

    protected function initEditorOptions()
    {
        $ret = [];
        switch ($this->editor) {
            case self::EDITOR_Summernote:
                # code...
                $config = [$this->editorOptions];
                break;
            case self::EDITOR_TinyMCE:
                # code...
                $config = [$this->editorOptions];
                break;
            case self::EDITOR_CKEditor:
                # code...
                $config = [$this->editorOptions];
                break;

            default:
                # code...
                $config = [];
                break;
        }

        $ret = [$this->editor => [
            'config' => $config
        ]];

        return $ret;
    }
}

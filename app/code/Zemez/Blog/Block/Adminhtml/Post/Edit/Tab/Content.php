<?php
namespace Zemez\Blog\Block\Adminhtml\Post\Edit\Tab;

class Content extends \Magento\Backend\Block\Widget\Form\Generic implements
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var $model \Zemez\Blog\Model\Post */
        $model = $this->_coreRegistry->registry('tm_blog_post');



        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('post_');

        $fieldset = $form->addFieldset(
            'content_fieldset',
            ['legend' => __('Content'), 'class' => 'fieldset-wide']
        );

        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        if ($model->getData('image')) {
            $model->setData('post_image', $model->getData('image'));
        }
        $fieldset->addField(
            'post_image',
            'image',
            [
                'title' => __('Thumbnail Image'),
                'label' => __('Thumbnail Image'),
                'name' => 'post_image'
            ]
        );

        // $fieldset->addField(
        //     'tags',
        //     'text',
        //     [
        //         'name' => 'tags',
        //         'label' => __('Tags'),
        //         'title' => __('Tags'),
        //         'required' => false,

        //     ]
        // );

        $fieldset->addField(
            'content',
            'editor',
            [
                'name' => 'content',
                'style' => 'height:36em;',
                'required' => false,
                'config' => $wysiwygConfig,
                'label' => __('Content'),
                'title' => __('Content'),
            ]
        );

        $fieldset->addField(
            'short_content',
            'editor',
            [
                'name' => 'short_content',
                'style' => 'height:36em;',
                'required' => false,
                'config' => $wysiwygConfig,
                'label' => __('Short content'),
                'title' => __('Short content'),
            ]
        );


        $this->_eventManager->dispatch('adminhtml_tm_blog_post_edit_tab_content_prepare_form', ['form' => $form]);
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Content');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Content');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}

<?php

namespace Zemez\SocialLogin\Block\Account;

use Zemez\SocialLogin\Model\ProviderInterface;
use Zemez\SocialLogin\Model\ResourceModel\Provider\Collection as ProviderCollection;
use Zemez\SocialLogin\Helper\Data as SocialLoginHelper;
use Magento\Framework\Data\Helper\PostHelper as PostDataHelper;
use Magento\Framework\View\Element\Template;

/**
 * SocialLogin block.
 */
class SocialLogin extends Template
{
    /**
     * @var string
     */
    protected $_template = 'social.phtml';

    /**
     * @var ProviderCollection
     */
    protected $_collection;

    /**
     * @var SocialLoginHelper
     */
    protected $_helper;

    /**
     * @var
     */
    protected $_postDataHelper;

    /**
     * SocialLogin constructor.
     *
     * @param ProviderCollection $collection
     * @param SocialLoginHelper  $helper
     * @param PostDataHelper     $postDataHelper
     * @param Template\Context   $context
     * @param array              $data
     */
    public function __construct(
        ProviderCollection $collection,
        SocialLoginHelper $helper,
        PostDataHelper $postDataHelper,
        Template\Context $context,
        array $data
    ) {
        $this->_collection = $collection;
        $this->_helper = $helper;
        $this->_postDataHelper = $postDataHelper;
        parent::__construct($context, $data);
    }

    /**
     * Check if has providers.
     *
     * @return bool
     */
    public function hasProviders()
    {
        return $this->_collection->count() > 0;
    }

    /**
     * @return ProviderCollection|ProviderInterface[]
     */
    public function getProviders()
    {
        return $this->_collection;
    }

    /**
     * Get provider icon.
     *
     * @param ProviderInterface $provider
     *
     * @return string
     */
    public function getProviderIcon(ProviderInterface $provider)
    {
        return $this->getViewFileUrl("Zemez_SocialLogin::images/providers/{$provider->getCode()}.png");
    }

    /**
     * Get provider cod for font icon.
     *
     * @param ProviderInterface $provider
     *
     * @return string
     */
    public function getProviderCode(ProviderInterface $provider)
    {
        return $this->_helper->getProviderCode($provider);
    }

    /**
     * Get provider label.
     *
     * @param ProviderInterface $provider
     *
     * @return string
     */
    public function getProviderLabel(ProviderInterface $provider)
    {
        return $this->_helper->getProviderLabel($provider);
    }

    /**
     * Get grant post data.
     *
     * @param ProviderInterface $provider
     *
     * @return string
     */
    public function getGrantPostData(ProviderInterface $provider)
    {
        return $this->_postDataHelper->getPostData(
            $this->getUrl('social/login/grant'),
            [
                'provider' => $provider->getCode(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function _toHtml()
    {
        if (!$this->_helper->isEnabled()) {
            return '';
        }

        return parent::_toHtml();
    }
}

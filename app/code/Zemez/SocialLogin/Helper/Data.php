<?php

namespace Zemez\SocialLogin\Helper;

use Zemez\SocialLogin\Model\ProviderInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Data helper.
 */
class Data extends AbstractHelper
{
    /**
     * Enabled config path.
     */
    const XML_PATH_ENABLED = 'social_login/general/enabled';

    /**
     * Social provider config path.
     */
    const XML_PATH_PROVIDER = 'social_login/providers/%s';

    /**
     * Check if module enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get provider options.
     *
     * @param string $provider
     *
     * @return mixed
     */
    public function getProviderOptions($provider)
    {
        return (array) $this->scopeConfig->getValue(
            sprintf(self::XML_PATH_PROVIDER, $provider),
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get redirect uri.
     *
     * @param string $provider
     *
     * @return string
     */
    public function getRedirectUri($provider)
    {
        if ($provider instanceof ProviderInterface) {
            $provider = $provider->getCode();
        }

        return $this->_urlBuilder->getUrl(
            'social/login/connect',
            [
                'provider' => $provider,
                '_secure' => true,
                '_nosid' => true
            ]
        );
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
        $code = $provider->getCode();
        $code .= ($code == 'google') ? '-plus' : '';

        return $code;
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
        $name = $provider->getName();
        $name .= ($name == 'Google') ? '+' : '';

        return $name;
    }
}

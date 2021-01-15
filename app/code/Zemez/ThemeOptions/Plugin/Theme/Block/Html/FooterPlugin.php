<?php

namespace Zemez\ThemeOptions\Plugin\Theme\Block\Html;

use \Magento\Theme\Block\Html\Footer;
use \Zemez\ThemeOptions\Helper\Data;

/**
 * Config edit plugin.
 *
 * @package Zemez\ThemeOptions\Plugin\Theme\Block\Html
 */
class FooterPlugin
{
    /**
     * Config sections.
     *
     * @var helper
     */
    protected $_helper;

    /**
     * @param \Zemez\ThemeOptions\Helper\Data $helper
     *
     */
    public function __construct(
        Data $helper
    ) {
        $this->_helper = $helper;
    }

    /**
     * Get Copyright
     *
     * @return string
     */
    public function aroundGetCopyright(Footer $subject, callable $proceed)
    {
        $copyright = $this->_helper->getCopyright();
        return $copyright ? $copyright : $proceed();
    }

}
<?php

namespace Unet\SocialShare\Block;

use Magento\Framework\View\Element\Template;
use Unet\SocialShare\Adapter\SocialAdapter;

abstract class AbstractShare extends Template implements SocialAdapter
{
    const FACEBOOK_APP_ID = 'social_share/facebook/facebook_app_id';
    const TWITTER_NAME = 'social_share/twitter/twitter_site_name';

    /**
     * @var \Unet\SocialShare\Helper\Data
     */
    protected $helper;

    /**
     * @var OpenGraph
     */
    protected $openGraph;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Unet\SocialShare\Helper\Data $helper,
        \Unet\SocialShare\Block\OpenGraph $openGraph,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->openGraph = $openGraph;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getShareConfig()
    {
        return $this->helper->getShareConfig();
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->openGraph->getPageImage();
    }
}

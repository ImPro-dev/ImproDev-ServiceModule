<?php

namespace ImproDev\ServiceModule\Plugin\Customer\Block\Account;

use \Magento\Customer\Block\Account\Link as AccountLink;
use \Magento\Framework\App\Http\Context as HttpContext;
use \Magento\Customer\Model\Context;
use \Magento\Customer\Model\Registration;

/**
 * Config edit plugin.
 *
 * @package ImproDev\ServiceModule\Plugin\Customer\Block\Account
 */
class Link
{
    /**
     * Customer session
     *
     * @var \Magento\Framework\App\Http\Context
     */
    protected $_httpContext;

    /**
     * @var \Magento\Customer\Model\Registration
     */
    protected $_registration;

    /**
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param \Magento\Customer\Model\Registration $registration
     */
    public function __construct(
        HttpContext $httpContext,
        Registration $registration
    ) {
        $this->_httpContext = $httpContext;
        $this->_registration = $registration;
    }

    /**
     * Show/hide My Account link in header links
     *
     * @return string
     *
     */
    public function aroundToHtml(AccountLink $subject, callable $proceed)
    {
        return !$this->_registration->isAllowed() || $this->_httpContext->getValue(Context::CONTEXT_AUTH)
                ? $proceed()
                : '';
    }

}
<?php
namespace ImproDev\ServiceModule\Block;

use \Magento\Framework\View\Element\Template;

class CategoriesCollection extends Template
{

    protected $_categoryHelper;
    protected $_topMenu;

    /**
     * @param \Magento\Catalog\Helper\Category $categoryHelper
     * @param \Magento\Theme\Block\Html\Topmenu $topMenu
     * @param \Magento\Framework\View\Element\Template\Context $context
     */
    public function __construct(
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Theme\Block\Html\Topmenu $topMenu,
        \Magento\Framework\View\Element\Template\Context $context
    )
    {

        $this->_categoryHelper = $categoryHelper;
        $this->_topMenu = $topMenu;
        parent::__construct($context);
    }

    /**
     * Return categories helper
     */
    public function getCategoryHelper()
    {
        return $this->_categoryHelper;
    }

    /**
     * Retrieve current store categories
     *
     * @param bool|string $sorted
     * @param bool $asCollection
     * @param bool $toLoad
     * @return \Magento\Framework\Data\Tree\Node\Collection || \Magento\Catalog\Model\Resource\Category\Collection || array
     */
    public function getStoreCategories($sorted = false, $asCollection = false, $toLoad = true)
    {
        return $this->_categoryHelper->getStoreCategories($sorted, $asCollection, $toLoad);
    }
}
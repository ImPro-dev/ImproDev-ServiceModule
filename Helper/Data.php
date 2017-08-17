<?php

namespace ImproDev\ServiceModule\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\CatalogInventory\Model\Stock\StockItemRepository;


class Data extends AbstractHelper
{
    /**
     * Stock Item Repository
     *
     * @var \Magento\CatalogInventory\Model\Stock\StockItemRepository
     */
    protected $_stockItemRepository;

    /**
     * @param \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository
     *
     */
    public function __construct(
        StockItemRepository $stockItemRepository
    ) {
        $this->_stockItemRepository = $stockItemRepository;
    }

    /**
     * Get product quantity
     *
     * @param string $productId
     * @return int|null
     */
    public function getProductQty($productId)
    {
        return $this->_stockItemRepository->get($productId)->getQty();
    }

    /**
     * Get sale label
     *
     * @param string $price
     * @param string $finalPrice
     * @return int|null
     */
    public function getSaleLabel($price, $finalPrice)
    {
        $label = '';
        if ($finalPrice < $price) {
            $label = '<span class="sale-label">' . __('Sale') . ' -' . round(($price - $finalPrice) * 100 / $price, 0) . '%</span>';
        }
        return $label;
    }


    /**
     * Resort tabs labels on product page
     *
     * @param array $group
     * @return array
     */
    public function resortInfoGroup($group)
    {
        return list($group[0], $group[1]) = array($group[1], $group[0]);
    }


}
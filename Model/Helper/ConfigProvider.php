<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\Core\Model\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class ConfigProvider
 * @package CreenSight\Core\Model\Config
 */
class ConfigProvider
{
    /**
     * @var string
     */
    const XML_PATH_GENERAL_MENU = 'creensight/general/menu';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * ConfigProvider constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param string $path
     * @param number $storeId
     * @return mixed
     */
    public function execute($path, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}

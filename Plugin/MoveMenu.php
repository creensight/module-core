<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\Core\Plugin;

use Magento\Backend\Model\Menu\Builder\AbstractCommand;
use CreenSight\Core\Model\Helper\ConfigProvider;

/**
 * Class MoveMenu
 * @package CreenSight\Core\Plugin
 */
class MoveMenu
{
    /**
     * @var string
     */
    const CREENSIGHT_CORE = 'CreenSight_Core::menu';

    /**
     * @var ConfigProvider
     */
    protected $configProvider;

    /**
     * MoveMenu constructor.
     *
     * @param ConfigProvider $configProvider
     */
    public function __construct(
        ConfigProvider $configProvider
    ) {
        $this->configProvider = $configProvider;
    }

    /**
     * @param AbstractCommand $subject
     * @param $itemParams
     *
     * @return mixed
     */
    public function afterExecute(
        AbstractCommand $subject,
        $itemParams
    ) {
        if ($this->configProvider->execute(ConfigProvider::XML_PATH_GENERAL_MENU)) {
            if (strpos($itemParams['id'], 'CreenSight_') !== false
                && isset($itemParams['parent'])
                && strpos($itemParams['parent'], 'CreenSight_') === false) {
                $itemParams['parent'] = self::CREENSIGHT_CORE;
            }
        } elseif ((isset($itemParams['id']) && $itemParams['id'] === self::CREENSIGHT_CORE)
                || (isset($itemParams['parent']) && $itemParams['parent'] === self::CREENSIGHT_CORE)) {
            $itemParams['removed'] = true;
        }

        return $itemParams;
    }
}

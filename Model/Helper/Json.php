<?php
/**
 * @copyright Copyright © 2020 CreenSight. All rights reserved.
 * @author CreenSight Development Team <magento@creensight.com>
 */

namespace CreenSight\Core\Model\Helper;

use Magento\Framework\Json\Helper\Data as JsonHelper;

/**
 * Class Json
 * @package CreenSight\Core\Model\Helper
 */
class Json
{
    /**
     * @var JsonHelper
     */
    protected $jsonHelper;

    /**
     * Json constructor.
     *
     * @param JsonHelper $jsonHelper
     */
    public function __construct(
        JsonHelper $jsonHelper
    ) {
        $this->jsonHelper = $jsonHelper;
    }

    /**
     * Encode the mixed $value into the JSON format
     *
     * @param mixed $value
     * @return string
     */
    public function encode($value)
    {
        $encodeValue = '{}';
        
        try {
            $encodeValue = $this->jsonHelper->jsonEncode($value);
        } catch (Exception $e) { }

        return $encodeValue;
    }

    /**
     * Decodes the given $value string which is
     * encoded in the JSON format
     *
     * @param string $value
     * @return mixed
     */
    public function decode($value)
    {
        $decodeValue = [];
        
        try {
            $decodeValue = $this->jsonHelper->jsonDecode($value);
        } catch (Exception $e) { }

        return $decodeValue;
    }
}

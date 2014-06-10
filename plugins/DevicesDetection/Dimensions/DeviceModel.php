<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\DevicesDetection\Dimensions;

use Piwik\Piwik;
use Piwik\Tracker\Request;

class DeviceModel extends Base
{
    protected $fieldName = 'config_device_model';
    protected $fieldType = 'VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL';

    public function getName()
    {
        return Piwik::translate('DevicesDetection_DeviceModel');
    }

    public function onNewVisit(Request $request, $visit)
    {
        $userAgent = $request->getUserAgent();
        $parser    = $this->getUAParser($userAgent);

        return $parser->getModel();
    }
}

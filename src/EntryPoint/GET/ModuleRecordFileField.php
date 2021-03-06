<?php
/**
 * ©[2016] SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.
 */

namespace SugarAPI\SDK\EntryPoint\GET;

use SugarAPI\SDK\EntryPoint\Abstracts\GET\AbstractGetFileEntryPoint;

class ModuleRecordFileField extends AbstractGetFileEntryPoint {

    /**
     * @inheritdoc
     */
    protected $_URL = '$module/$record/file/$field';


}
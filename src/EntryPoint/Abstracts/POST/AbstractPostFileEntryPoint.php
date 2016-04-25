<?php

namespace SugarAPI\SDK\EntryPoint\Abstracts\POST;

use SugarAPI\SDK\EntryPoint\Abstracts\AbstractEntryPoint;
use SugarAPI\SDK\Request\POSTFile;
use SugarAPI\SDK\Response\JSON;

abstract class AbstractPostFileEntryPoint extends AbstractEntryPoint {

    public function __construct($url, array $options = array()) {
        $this->setRequest(new POSTFile());
        parent::__construct($url, $options);
    }

    public function execute($data = null) {
        parent::execute($data);
        $this->setResponse(new JSON($this->Request->getResponse(),$this->Request->getCurlObject()));
        return $this;
    }

}
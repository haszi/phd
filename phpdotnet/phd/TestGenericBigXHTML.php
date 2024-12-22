<?php
namespace phpdotnet\phd;

class TestGenericBigXHTML extends Package_Generic_BigXHTML {
    public function __construct(
        Config $config,
        OutputHandler $outputHandler
    ) {
        parent::__construct($config, $outputHandler);
        $this->appendToBuffer = true;
    }
    
    public function __destruct() {
        echo $this->buffer;
        $this->close();
    }

    public function update($event, $value = null) {
        switch($event) {
        case Render::STANDALONE:
            parent::update($event, $value);
            break;
        }
    }
}

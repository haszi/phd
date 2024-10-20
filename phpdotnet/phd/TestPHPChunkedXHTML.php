<?php
namespace phpdotnet\phd;

class TestPHPChunkedXHTML extends Package_PHP_ChunkedXHTML {
    public function __construct(Config $config) {
        parent::__construct($config);
    }

    public function update($event, $value = null) {
        switch($event) {
        case Render::CHUNK:
            parent::update($event, $value);
            break;
        case Render::STANDALONE:
            parent::update($event, $value);
            break;
        case Render::INIT:
            $this->setOutputDir($this->config->output_dir() . strtolower($this->getFormatName()) . '/');
            break;
        //No verbose
        }
    }

    public function writeChunk($id, $fp) {
        $filename = $this->getOutputDir() . $id . $this->getExt();

        rewind($fp);
        $content = "\n";
        $content .= stream_get_contents($fp);

        if ($id === "") {
            $filename = $this->config->xml_file();
        }

        echo "Filename: " . basename($filename) . "\n";
        echo "Content:" . $content . "\n";
    }
}

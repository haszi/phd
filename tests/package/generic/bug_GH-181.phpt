--TEST--
Bug GH-181 - <title/> renders sibling elements inside title
--FILE--
<?php
namespace phpdotnet\phd;

require_once __DIR__ . "/../../setup.php";

$xml_file = __DIR__ . "/data/bug_GH-181.xml";

$config->setXml_file($xml_file);

$format = new TestGenericBigXHTML($config, $outputHandler);
$render = new TestRender(new Reader($outputHandler), $config, $format);

$render->run();
?>
--EXPECT--
<div id="bug_181" class="chapter">
 <div class="section">
  <div class="refsect1 parameters" id="refsect1-bug_181-parameters">
   <h3 class="title"></h3>
   <p class="simpara">%failed xi:xinclude%</p>
  </div>

 </div>
 
 <div class="section">
  <div class="refsect1 parameters" id="refsect1-bug_181-parameters">
   <h3 class="title"/>
   <p class="simpara">%failed xi:xinclude%</p>
  </div>

 </div>
</div>

<?

require_once('simpletest/simpletest.php');
class ReporterShowingPasses extends HtmlReporter {
    
    function paintPass($message) {
        parent::paintPass($message);
        print "<span class=\"pass\">Pass</span>: ";
        $breadcrumb = $this->getTestList();
        array_shift($breadcrumb);
        print implode("-&gt;", $breadcrumb);
        print "-&gt;$message<br />\n";
    }
    
    protected function getCss() {
        return parent::getCss() . ' .pass { color: green; }';
    }
}

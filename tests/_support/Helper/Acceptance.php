<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

    // reset localStorage each test
    public function _before() {
        #echo "HOOKS!";
        $I = $this->getModule('WebDriver');
        $I->amOnPage('/index.html');
        $I->executeJS('localStorage.clear();');
    }

}

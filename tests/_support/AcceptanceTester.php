<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */

    // page creation shorthand
    public function createFirstWikiPage($content) {
        $this->amOnPage('/');
        $this->click('//a[@class="new" and @href="#FrontPage"]');
        $this->fillField('#textarea', $content);
        $this->click('save');
    }

    // page creation shorthand
    public function createWikiPage($name, $content) {
        $this->amOnPage('/#'.$name);
        $this->fillField('#textarea', $content);
        $this->click('save');
    }

}

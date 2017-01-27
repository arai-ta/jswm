<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Edit a wiki page');
$I->amOnPage('/index.html');
$I->see('Help', '//h1');

$I->amGoingTo('edit FrontPage');
$I->click('//a[@class="new" and @href="#FrontPage"]');

$I->expect('Edit form is shown');
$I->see('FrontPage', '//h1');
$I->seeInCurrentUrl('#FrontPage');
$I->seeElement('textarea');

$I->amGoingTo('Input content');
$I->fillField('#textarea', 'Hello, jswm!');
$I->click('save');

$I->expect('content was shown');
$I->see('FrontPage', '//h1');
$I->seeInCurrentUrl('#FrontPage');
$I->dontSeeElement('textarea');
$I->see('Hello, jswm!', '#content');


<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see home page when it exist');

$I->amOnPage('/index.html');

$I->click('//a[@class="new" and @href="#FrontPage"]');
$I->fillField('#textarea', 'Hello, it is fine today.');
$I->click('save');

$I->reloadPage();

$I->see('FrontPage', '//h1');
$I->see('Hello, it is fine today.', '#content');

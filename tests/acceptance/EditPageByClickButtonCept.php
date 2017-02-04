<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('edit current page by click "edit" link');

$I->amOnPage('/index.html#MacOS');
$I->see('MacOS', '//h1');
$I->seeElement('textarea');
$I->fillField('#textarea', '{copland}');
$I->click('save');
$I->dontSeeElement('textarea');
$I->see('{copland}', '#content');

$I->click('Edit');
$I->seeElement('textarea');
$I->fillField('#textarea', 'TEMPO');
$I->click('save');

$I->dontSeeElement('textarea');
$I->see('TEMPO', '#content');

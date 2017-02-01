<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('Edit wiki page by double clicking #content area');

$I->amOnPage('/index.html#PPAP');
$I->see('PPAP', '//h1');
$I->seeElement('textarea');
$I->fillField('#textarea', 'I have a pen.');
$I->click('save');

$I->dontSeeElement('textarea');
$I->see('I have a pen.', '#content');

$I->doubleClick('#content');
$I->seeElement('textarea');
$I->fillField('#textarea', 'I have an apple.');
$I->click('save');

$I->dontSeeElement('textarea');
$I->see('I have an apple.', '#content');

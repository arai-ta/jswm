<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('open wiki page');

$I->amOnPage('/index.html');

$I->see('Help', '//body/header/h1');
$I->see('jswmとは', '//article[@id="content"]/pre');

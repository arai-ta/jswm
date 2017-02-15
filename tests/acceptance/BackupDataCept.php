<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('backup wiki data as jsonfile.');

$I->amOnPage('/index.html');

$I->amGoingTo('create data');
$I->createFirstWikiPage('Hello,Backup!!');
$I->createWikiPage('FooPage', 'This page   contains consecutive spaces.');
$I->createWikiPage('BarPage', 'This page contains multibyte string. こんにちは。');
$I->createWikiPage('QuxPage', 'contains '."\n".'newline.');

$I->amGoingTo('do backup');
$I->click('Backup');
$I->see('Dump', 'a[download]');

$dataURI = $I->grabAttributeFrom('a[download]', 'href');
$actuals = explode(',', $dataURI, 2);

$I->amGoingTo('verify it becames expected format');
$I->assertEquals('data:application/json;charset=UTF-8', $actuals[0], 'start with data URI scheme.');
$I->assertContains('"FrontPage":"Hello,Backup!!"', $actuals[1], 'includes encoded page');
$I->assertContains('"FooPage":"This\u0020page\u0020\u0020\u0020contains\u0020consecutive\u0020spaces."', $actuals[1], 'includes encoded page');
#$I->assertContains('"BarPage":"This\u0020page\u0020contains\u0020multibyte\u0020string.\u0020こんにちは。"', $actuals[1], 'includes encoded page');
$I->assertContains('"QuxPage":"contains\u0020\nnewline."', $actuals[1], 'includes encoded page');

$decoded = json_decode($actuals[1]);

$I->amGoingTo('verify it is valid json');
$I->assertTrue($decoded !== false);
$I->assertEquals('Hello,Backup!!', $decoded->FrontPage);
$I->assertEquals('This page   contains consecutive spaces.', $decoded->FooPage);
#$I->assertEquals('This page contains multibyte string. こんにちは。', $decoded->BarPage);
$I->assertEquals('contains '."\n".'newline.', $decoded->QuxPage);

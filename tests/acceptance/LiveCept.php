<?php

$I = new AcceptanceTester($scenario);

$I->wantTo("ensure that OFI opens to the home page.");
$I->amOnPage("/");
$I->see("Online Feedback Insight");

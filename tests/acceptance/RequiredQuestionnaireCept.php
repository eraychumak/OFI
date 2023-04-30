<?php
$I = new AcceptanceTester($scenario);
$I->wantTo("See the required questionnaire in the list of questionnaires.");

$I->amOnPage("/");
$I->see("Questionnaire design and its use in research");
$I->click("Questionnaire design and its use in research");
$I->dontSee("View as admin");

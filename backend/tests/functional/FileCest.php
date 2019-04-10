<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class FileCest
{

    /**
     * @param FunctionalTester $I
     */
    public function openIndex(FunctionalTester $I)
    {
        $I->amOnPage('/file/index');
        //$I->fillField('Username', 'erau');
        //$I->fillField('Password', 'password_0');
        //$I->click('login-button');

        //$I->see('Logout (erau)', 'form button[type=submit]');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }
}
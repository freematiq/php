<?php
use yii\helpers\Url as Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));        
        $I->see('Digitalspace');
        
        $I->seeLink('Курсы');
        $I->click('Курсы');
        $I->wait(2); // wait for page to be opened
        
        $I->see('Courses');
    }
}

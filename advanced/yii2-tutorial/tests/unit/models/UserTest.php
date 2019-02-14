<?php
namespace tests\models;
use app\models\User;
use app\tests\fixtures\UserFixture;

class UserTest extends \Codeception\Test\Unit
{
    public function _fixtures()
    {
        return [
            'profiles' => [
                'class' => UserFixture::className(),
                // fixture data located in tests/_data/user.php
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
        ];
    }

    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(100));
        expect($user->username)->equals('php');

        expect_not(User::findIdentity(999));
    }

    public function testFindById() {
        $user = User::findIdentity(100);
        expect($user->getId())->equals(100);

    }

//    public function testFindUserByAccessToken()
//    {
//        expect_that($user = User::findIdentityByAccessToken('php_auth'));
//        expect($user->username)->equals('php');
//
//        expect_not(User::findIdentityByAccessToken('non-existing'));
//    }

    public function testFindUserByUsername()
    {
        expect_that($user=User::findByUsername('php'));
        expect_not(User::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findByUsername('php');
        expect_that($user->validateAuthKey('php_auth'));
        expect_not($user->validateAuthKey('php_auth1'));

        expect_that($user->validatePassword('123123'));
        expect_not($user->validatePassword('123456'));
    }

}

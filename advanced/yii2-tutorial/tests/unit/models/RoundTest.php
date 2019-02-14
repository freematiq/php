<?php

namespace tests\models;
use app\models\User;

class RoundTest extends \Codeception\Test\Unit
{
    /**
     * @dataProvider providerRoundBank()
     */
    public function testRoundBank($a, $b) {
        $res = User::roundBank($a);
        $this->assertEquals($b, $res);
    }

    public function providerRoundBank() {
        return [
            [4, 4],
            [40, 40],
            [0, 0],
            [4.565335, 4.57],
            [4.564335, 4.56],
            [34.565783, 34.57],
            [34.565, 34.56],
            [56.355532, 56.36],
            [9.4557642, 9.46],
            [10.345643, 10.35],
            [10.346643, 10.35],
            [10.344643, 10.34],
            [10.345, 10.34],
            [7.235345, 7.24],
            [7.231345, 7.23],
            [9.285456, 9.29],
            [3.225, 3.22],
            [10.25527, 10.26],
            [11.41525, 11.42],
            [0.105, 0.10],
            [0.115, 0.12],
            [0.00555, 0.01],
            [0.0049, 0.00],
        ];
    }
}

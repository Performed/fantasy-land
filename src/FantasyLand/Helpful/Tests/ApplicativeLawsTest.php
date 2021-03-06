<?php

declare(strict_types=1);

namespace FunctionalPHP\FantasyLand\Helpful\Tests;

use FunctionalPHP\FantasyLand\Applicative;
use FunctionalPHP\FantasyLand\Helpful\ApplicativeLaws;
use FunctionalPHP\FantasyLand\Useful\Identity;

class ApplicativeLawsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideApplicativeTestData
     */
    public function test_it_should_obey_applicative_laws(
        Applicative $u,
        Applicative $v,
        Applicative $w,
        callable $f,
        $x
    ) {
        ApplicativeLaws::test(
            [$this, 'assertEquals'],
            Identity::of,
            $u,
            $v,
            $w,
            $f,
            $x
        );
    }

    public function provideApplicativeTestData()
    {
        return [
            'default' => [
                '$u' => Identity::of(function () {
                    return 1;
                }),
                '$v' => Identity::of(function () {
                    return 5;
                }),
                '$w' => Identity::of(function () {
                    return 7;
                }),
                '$f' => function ($x) {
                    return $x + 400;
                },
                '$x' => 33
            ],
        ];
    }
}

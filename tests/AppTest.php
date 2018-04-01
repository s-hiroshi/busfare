<?php
namespace HS\BusFare;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function provideDataForTest()
    {
        return [
            0 => ['input' => '210:Cn,In,Iw,Ap,Iw', 'expected' => '170'],
            1 => ['input' => '220:Cp,In', 'expected' => '110'],
            2 => ['input' => '230:Cw,In,Iw', 'expected' => '240'],
            3 => ['input' => '240:In,An,In', 'expected' => '240'],
            4 => ['input' => '250:In,In,Aw,In', 'expected' => '260'],
            5 => ['input' => '260:In,In,In,In,Ap', 'expected' => '260'],
            6 => ['input' => '270:In,An,In,In,Ip', 'expected' => '410'],
            7 => ['input' => '280:Aw,In,Iw,In', 'expected' => '210'],
            8 => ['input' => '200:An', 'expected' => '200'],
            9 => ['input' => '210:Iw', 'expected' => '60'],
            10 => ['input' => '220:Ap', '0'],
            11 => ['input' => '230:Cp', 'expected' => '0'],
            12 => ['input' => '240:Cw', 'expected' => '60'],
            13 => ['input' => '250:In', 'expected' => '130'],
            14 => ['input' => '260:Cn', 'expected' => '130'],
            15 => ['input' => '270:Ip', 'expected' => '0'],
            16 => ['input' => '280:Aw', 'expected' => '140'],
            17 => ['input' => '1480:In,An,In,In,In,Iw,Cp,Cw,In,Aw,In,In,Iw,Cn,Aw,Iw', 'expected' => '5920'],
            18 => ['input' => '630:Aw,Cw,Iw,An,An', 'expected' => '1740'],
            19 => ['input' => '340:Cn,Cn,Ip,Ap', 'expected' => '340'],
            20 => ['input' => '240:Iw,Ap,In,Iw,Aw', 'expected' => '120'],
            21 => ['input' => '800:Cw,An,Cn,Aw,Ap', 'expected' => '1800'],
            22 => ['input' => '1210:An,Ip,In,Iw,An,Iw,Iw,An,Iw,Iw', 'expected' => '3630'],
            23 => ['input' => '530:An,Cw,Cw', 'expected' => '810'],
            24 => ['input' => '170:Aw,Iw,Ip', 'expected' => '90'],
            25 => ['input' => '150:In,Ip,Ip,Iw,In,Iw,Iw,In,An,Iw,Aw,Cw,Iw,Cw,An,Cp,Iw', 'expected' => '580'],
            26 => ['input' => '420:Cn,Cw,Cp', 'expected' => '320'],
            27 => ['input' => '690:Cw,In,An,Cp,Cn,In', 'expected' => '1220'],
            28 => ['input' => '590:Iw,Iw,Cn,Iw,Aw,In,In,Ip,Iw,Ip,Aw', 'expected' => '1200'],
            29 => ['input' => '790:Cw,Cn,Cn', 'expected' => '1000'],
            30 => ['input' => '1220:In,In,An,An,In,Iw,Iw,In,In,Ip,In,An,Iw', 'expected' => '4590'],
            31 => ['input' => '570:Cw,Cn,Cp', 'expected' => '440'],
            32 => ['input' => '310:Cn,Cw,An,An,Iw,Cp,Cw,Cn,Iw', 'expected' => '1100'],
            33 => ['input' => '910:Aw,In,Iw,Iw,Iw,Iw,Iw,An,Cw,In', 'expected' => '2290'],
            34 => ['input' => '460:Iw,Cw,Cw,Cn', 'expected' => '590'],
            35 => ['input' => '240:Iw,Iw,In,Iw,In,In,Cn,In,An', 'expected' => '780'],
            36 => ['input' => '1240:In,In,In,Ap,In,Cw,Iw,Iw,Iw,Aw,Cw', 'expected' => '2170'],
            37 => ['input' => '1000:Iw,Ip,In,An,In,In,In,An,In,Iw,In,In,Iw,In,Iw,Iw,Iw,An', 'expected' => '5500'],
            38 => ['input' => '180:In,Aw,Ip,Iw,In,Aw,In,Iw,Iw,In', 'expected' => '330'],
            39 => ['input' => '440:In,Ip,Cp,Aw,Iw,In,An', 'expected' => '660'],
            40 => ['input' => '1270:Ap,In,An,Ip,In,Ip,Ip', 'expected' => '1270'],
        ];
    }

    /**
     * @dataProvider provideDataForTest
     */
    public function testRun($input, $expected)
    {
        $app = new App();
        $actual = $app->run($input);
        $this->assertThat($actual, $this->equalTo($expected));
    }
}

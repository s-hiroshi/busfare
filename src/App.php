<?php

namespace HS\BusFare;

class App
{
    public function run($input)
    {
        [$fare, $data] = explode(':', $input);
        $data = explode(',', $data);

        $age['I'] = $age['C'] = $age['A'] = [];
        foreach ($data as $value) {
            [$ageType, $priceType] = str_split($value);
            $age[$ageType][] = new Passenger($priceType);
        }

        $busFare    = new BusFare($age['I'], $age['C'], $age['A']);
        $busFare->makeInfantFree();
        $calculator = new BusFareCalculator($fare);
        $total      = $calculator->calcTotalFare($busFare);

        return $total;
    }
}

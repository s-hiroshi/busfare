<?php


namespace HS\BusFare;


class BusFareCalculator
{
    /**
     * @var int
     */
    private $fare;

    /**
     * @param int $fare
     */
    public function __construct(int $fare)
    {
        $this->fare = $fare;
    }

    /**
     * @param BusFare $busFare
     * @return int
     */
    public function calcTotalFare(BusFare $busFare): int
    {
        $adultsTotal   = $this->calc($busFare->getAdults(), $this->fare);
        $childrenTotal = $this->calc($busFare->getChildren(), $this->calcHalf($this->fare));
        $infantsTotal  = $this->calc($busFare->getInfants(), $this->calcHalf($this->fare));

        return $adultsTotal + $childrenTotal + $infantsTotal;
    }

    /**
     * @param Passenger[] $passengers
     * @param int         $baseFare
     * @return int
     */
    public function calc(array $passengers, int $baseFare): int
    {
        $total      = 0;
        $halfFare   = $this->calcHalf($baseFare);
        foreach ($passengers as $passenger) {
            if ($passenger->isFree()){
                continue;
            }
            
            if ($passenger->getPriceType() === Passenger::NORMAL_PASSENGER) {
                $total += $baseFare;
            } elseif ($passenger->getPriceType() === Passenger::WELFARE_PASSENGER) {
                $total += $halfFare;
            }
        }

        return $total;
    }

    /**
     * @param int $baseFare
     * @return float|int
     */
    public function calcHalf(int $baseFare)
    {
        return ceil(( $baseFare / 20 )) * 10;
    }
}
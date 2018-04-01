<?php


namespace HS\BusFare;

class BusFare
{
    /**
     * @var Passenger[]
     */
    private $infants;

    /**
     * @var Passenger[]
     */
    private $children;

    /**
     * @var Passenger[]
     */
    private $adults;

    /**
     * @var string[] $passengerOrder;
     */
    private  $passengerOrder = [Passenger::NORMAL_PASSENGER => 0, Passenger::WELFARE_PASSENGER => 1 , Passenger::PASS_PASSENGER => 2];
    
    /**
     * @param array      $infants
     * @param array      $children
     * @param array      $adults
     */
    public function __construct(array $infants, array $children, array $adults)
    {
        $this->infants  = $infants;
        $this->children = $children;
        $this->adults   = $adults;
    }

    /**
     * @return Passenger[]
     */
    public function getInfants(): array
    {
        return $this->infants;
    }
    
    /**
     * @return Passenger[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }
    
    /**
     * @return Passenger[]
     */
    public function getAdults(): array
    {
        return $this->adults;
    }

    /**
     * 幼児を料金区分がn, w, pの順に整列
     * 
     * @param Passenger[] $passengers
     * @return array
     */
    private function sortInfantsByPriceType($passengers): array
    {
        usort(
            $passengers,
            function (Passenger $passenger1, Passenger $passenger2) {
                $order1 = $this->passengerOrder[$passenger1->getPriceType()];
                $order2 = $this->passengerOrder[$passenger2->getPriceType()];

                return $order1 <=> $order2;
            }
        );

        return $passengers;
    }

    public function makeInfantFree()
    {
        $this->infants = $this->sortInfantsByPriceType($this->infants);

        for ($i = 0; $numberOfAdults = count($this->adults), $i < $numberOfAdults; $i++) {
            if (isset($this->infants[$i * 2])) {
                $this->infants[$i * 2]->setFree(true);
            }
            if (isset($this->infants[$i * 2 + 1])) {
                $this->infants[$i * 2 + 1]->setFree(true);
            }
        }
    }
}
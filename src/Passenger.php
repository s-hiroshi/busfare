<?php


namespace HS\BusFare;


class Passenger
{
    /**
     * @var string
     */
    const NORMAL_PASSENGER = 'n';

    /**
     * @var string
     */
    const WELFARE_PASSENGER = 'w';

    /**
     * @var string
     */
    const PASS_PASSENGER = 'p';

    /**
     * @var string
     */
    private $priceType;

    /**
     * @param bool
     */
    private $isFree = false;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->priceType = $type;
    }
    
    /**
     * @return string
     */
    public function getPriceType(): string
    {
        return $this->priceType;
    }
    
    /**
     * @param string $priceType
     */
    public function setPriceType(string $priceType): void
    {
        $this->priceType = $priceType;
    }

    /**
     * @return bool
     */
    public function isFree(): bool 
    {
        return $this->isFree;
    }
    
    /**
     * @param bool $isFree
     */
    public function setFree(bool $isFree): void
    {
        $this->isFree = $isFree;
    }
}
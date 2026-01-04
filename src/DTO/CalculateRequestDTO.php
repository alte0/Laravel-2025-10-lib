<?php

namespace Alte0\Calc\DTO;

class CalculateRequestDTO
{
    protected int $num1;
    protected int $num2;
    protected string $sign;

    public function __construct(
        string|null $num1,
        string|null $num2,
        string|null $sign
    )
    {
        $this->num1 = $num1 ? intval($num1) : 0;
        $this->num2 = $num2 ? intval($num2) : 0;
        $this->sign = $sign ?? '';
    }

    public function getNum1(): int
    {
        return $this->num1;
    }

    public function getNum2(): int
    {
        return $this->num2;
    }

    public function getSign(): string
    {
        return $this->sign;
    }
}

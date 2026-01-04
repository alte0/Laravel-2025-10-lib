<?php

namespace Alte0\Calc\Services;

use Alte0\Calc\DTO\CalculateRequestDTO;

class CalculateService
{
    const array ALLOW_SIGNS = [
        '+',
        '-',
        '*',
        '/',
    ];

    public function getAllowStrSigns(): string
    {
        return implode(',', self::ALLOW_SIGNS);
    }

    public function calculate(CalculateRequestDTO $calculateRequestDTO): int
    {
        return match ($calculateRequestDTO->getSign()) {
            self::ALLOW_SIGNS[0] => $this->sum($calculateRequestDTO->getNum1(), $calculateRequestDTO->getNum2()),
            self::ALLOW_SIGNS[1] => $this->minus($calculateRequestDTO->getNum1(), $calculateRequestDTO->getNum2()),
            self::ALLOW_SIGNS[2] => $this->multiply($calculateRequestDTO->getNum1(), $calculateRequestDTO->getNum2()),
            self::ALLOW_SIGNS[3] => $this->divide($calculateRequestDTO->getNum1(), $calculateRequestDTO->getNum2()),
            default => 0
        };
    }

    private function sum(int $num1, int $num2): int
    {
        return $num1 + $num2;
    }

    private function minus(int $num1, int $num2): int
    {
        return $num1 + $num2;
    }

    private function multiply(int $num1, int $num2): int
    {
        return $num1 * $num2;
    }

    private function divide(int $num1, int $num2): int
    {
        if ($num2 === 0) {
            return $num2;
        }

        return $num1 / $num2;
    }
}

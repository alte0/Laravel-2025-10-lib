<?php

namespace Alte0\Calc\Controllers;

use Alte0\Calc\DTO\CalculateRequestDTO;
use Alte0\Calc\Services\CalculateService;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class CalculateController
{
    private CalculateService $calculateService;

    public function __construct(
        CalculateService $calculateService
    )
    {
        $this->calculateService = $calculateService;
    }

    public function form(Request $request)
    {
        $calculateRequestDTO = new CalculateRequestDTO(
            $request->input('number1'),
            $request->input('number2'),
            $request->input('sign'),
        );

        $result = $this->calculateService->calculate($calculateRequestDTO);

        $signs = $this->calculateService::ALLOW_SIGNS;

        return View::make(
            "calculate-lib::form",
            [
                "number1" => $calculateRequestDTO->getNum1(),
                "number2" => $calculateRequestDTO->getNum2(),
                'signInput' => $calculateRequestDTO->getSign(),
                'result' => $result,
                'signs' => $signs,
            ]
        );
    }
}

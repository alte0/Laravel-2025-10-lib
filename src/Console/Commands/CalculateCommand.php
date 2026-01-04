<?php

namespace Alte0\Calc\Console\Commands;

use Alte0\Calc\DTO\CalculateRequestDTO;
use Alte0\Calc\Services\CalculateService;
use Illuminate\Console\Command;

class CalculateCommand extends Command
{
    private CalculateService $calculateService;
    protected $name = 'calculate-lib:calculate';
    protected $description = 'Calculate command';

    public function __construct(
        CalculateService $calculateService
    )
    {
        parent::__construct();

        $this->calculateService = $calculateService;
    }

    public function handle(): void
    {
        $num1 = $this->ask('Enter the number 1');

        $selectedSign = $this->choice(
            'Enter the operation sign',
            $this->calculateService::ALLOW_SIGNS,
            0
        );

        $num2 = $this->ask('Enter the number 2');

        $calculateRequestDTO = new CalculateRequestDTO($num1, $num2, $selectedSign);

        $result = $this->calculateService->calculate($calculateRequestDTO);

        $this->output->success("Result: {$result}");
    }
}

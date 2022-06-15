<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmojiCalculatorRequest;
use App\Services\EmojiCalculatorService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EmojiCalculatorController extends Controller
{
    private EmojiCalculatorService $emojiCalculatorService;

    /**
     * EmojiCalculatorController constructor.
     * @param EmojiCalculatorService $emojiCalculatorService
     */
    public function __construct(EmojiCalculatorService $emojiCalculatorService)
    {
        $this->emojiCalculatorService = $emojiCalculatorService;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Factory|View|Application
    {
        return view('emoji-calculator.index');
    }

    /**
     * @param EmojiCalculatorRequest $emojiCalculatorRequest
     * @return array
     */
    public function calculate(EmojiCalculatorRequest $emojiCalculatorRequest): array
    {
        $expression = $emojiCalculatorRequest->expression;
        return $this->emojiCalculatorService->calculate($expression);
    }
}

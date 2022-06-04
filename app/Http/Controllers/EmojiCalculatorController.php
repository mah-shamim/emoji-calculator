<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmojiCalculatorRequest;
use App\Services\EmojiCalculatorService;

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
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
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
        $emojiCalculatorResult = $this->emojiCalculatorService->calculate($expression);
        return $emojiCalculatorResult;
    }
}

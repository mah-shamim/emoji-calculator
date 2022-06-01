<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmojiCalculatorRequest;
use App\Services\EmojiCalculatorService;
use Illuminate\Http\Request;

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

    public function calculate(EmojiCalculatorRequest $emojiCalculatorRequest){
        $expression = $emojiCalculatorRequest->expression;
        return $this->emojiCalculatorService->calculate($expression);
        //return $emojiCalculatorRequest->all();
    }
}

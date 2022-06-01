<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        return view('emoji-calculator.index');
    }
}

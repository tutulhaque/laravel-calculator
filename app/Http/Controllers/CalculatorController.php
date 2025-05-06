<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $number1 = $request->input('number1');
        $operator = $request->input('operator');
        $number2 = $request->input('number2');

        if ($number1 !== null && $operator && $number2 !== null) {
            try {
                switch ($operator) {
                    case '+':
                        $result = $number1 + $number2;
                        break;
                    case '-':
                        $result = $number1 - $number2;
                        break;
                    case '*':
                        $result = $number1 * $number2;
                        break;
                    case '/':
                        if ($number2 == 0) {
                            throw new \Exception("Cannot divide by zero.");
                        }
                        $result = $number1 / $number2;
                        break;
                    default:
                        throw new \Exception("Invalid operator.");
                }

                return view('calculator', [
                    'result' => $result,
                    'number1' => $number1,
                    'operator' => $operator,
                    'number2' => $number2
                ]);
            } catch (\Exception $e) {
                return view('calculator', [
                    'error' => $e->getMessage(),
                    'number1' => $number1,
                    'operator' => $operator,
                    'number2' => $number2
                ]);
            }
        }
        return view('calculator', ['error' => 'Please enter valid numbers and select an operator.']);
    }
}

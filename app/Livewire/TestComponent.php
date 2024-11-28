<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $num1 = '';
    public $num2 = '';
    public $total = 0;
    public $number = 0;
    public $operation = '';

    public function render()
    {
        return view('livewire.test-component');
    }

    public function increment()
    {
        $this->number++;
    }

    public function decrement()
    {
        $this->number--;
    }

    public function hisob()
    {
        $num1 = (float) $this->num1;
        $num2 = (float) $this->num2;

        switch ($this->operation) {
            case '+':
                $this->total = $num1 + $num2;
                break;
            case '-':
                $this->total = $num1 - $num2;
                break;
            case '*':
                $this->total = $num1 * $num2;
                break;
            case '/':
                $this->total = $num2 != 0 ? $num1 / $num2 : 'Error: Division by zero';
                break;
            case '%':
                $this->total = $num2 != 0 ? $num1 % $num2 : 'Error: Division by zero';
                break;
            default:
                $this->total = 'Invalid operation';
                break;
        }
    }

    public function talaba()
    {
        return redirect('/talaba');
    }
}

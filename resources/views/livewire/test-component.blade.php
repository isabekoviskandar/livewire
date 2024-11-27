<div>
    <div class="container mt-5">
        <input type="text" wire:model="num1" placeholder="Enter A">
        <input type="text" wire:model="num2" placeholder="Enter B">

        <select wire:model="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>

        <button wire:click="hisob">Calculate</button>

        <h2>Result: {{ $total }}</h2>
    </div>
</div>

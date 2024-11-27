<div>
    <h1>Product CRUD</h1>

    <!-- Input fields -->
    <input type="text" wire:model="name" placeholder="Name" class="form-control mt-2">
    <input type="text" wire:model="price" placeholder="Price" class="form-control mt-2">

    @if ($isEditing)
        <button class="btn btn-success mt-2" wire:click="update">Update Product</button>
        <button class="btn btn-secondary mt-2" wire:click="cancel">Cancel</button>
    @else
        <button class="btn btn-primary mt-2" wire:click="create">Add Product</button>
    @endif

    <h2 class="mt-4">Product List</h2>
    @foreach ($products as $product)
        <div class="d-flex justify-content-between align-items-center mt-2">
            <div>
                <strong>{{ $product->name }}</strong> - ${{ number_format($product->price, 2) }}
            </div>
            <div>
                <button class="btn btn-info btn-sm" wire:click="edit({{ $product->id }})">Edit</button>
                <button class="btn btn-danger btn-sm" wire:click="delete({{ $product->id }})">Delete</button>
            </div>
        </div>
    @endforeach
</div>

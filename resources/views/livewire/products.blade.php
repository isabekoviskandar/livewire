<div>
    <h1>Product CRUD</h1>

    <!-- Input fields for adding/updating products -->
    <input type="text" wire:model="name" placeholder="Name" class="form-control mt-2">
    <input type="text" wire:model="price" placeholder="Price" class="form-control mt-2">

    @if ($isEditing)
        <button class="btn btn-success mt-2" wire:click="update">Update Product</button>
        <button class="btn btn-secondary mt-2" wire:click="cancel">Cancel</button>
    @else
        <button class="btn btn-primary mt-2" wire:click="create">Add Product</button>
    @endif

    <h2 class="mt-4">Product List</h2>

    <!-- Real-time search inputs -->
    <input type="text" wire:model="searchName" wire:keydown="search" placeholder="Search by Name" class="form-control mb-3">
    <input type="text" wire:model="searchPrice" wire:keydown="search" placeholder="Search by Price" class="form-control mb-3">

    <!-- Display product list -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" wire:click="edit({{ $product->id }})">Edit</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $product->id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

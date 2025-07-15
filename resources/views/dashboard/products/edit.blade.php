<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Products</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
    <flux:badge color="lime" class="mb-3 w-full">{{session()->get('successMessage')}}</flux:badge>
    @elseif(session()->has('errorMessage'))
    <flux:badge color="red" class="mb-3 w-full">{{session()->get('errorMessage')}}</flux:badge>
    @endif

    @if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <strong>Terjadi kesalahan:</strong>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <flux:input label="Name" name="name" value="{{ old('name', $product->name) }}" class="mb-3" />

        <flux:input label="Slug" name="slug" value="{{ old('slug', $product->slug) }}" class="mb-3" />

        <flux:textarea label="Description" name="description" class="mb-3">{{ old('description', $product->description) }}</flux:textarea>

        <flux:input label="SKU" name="sku" value="{{ old('sku', $product->sku) }}" class="mb-3" />

        <flux:select label="Category" name="product_category_id" class="mb-3">
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </flux:select>

        {{-- Tambahkan input Stock --}}
        <flux:input type="number" label="Stock" name="stock" value="{{ old('stock', $product->stock) }}" class="mb-3" />

        {{-- Tambahkan input Price --}}
        <flux:input type="number" step="0.01" label="Price" name="price" value="{{ old('price', $product->price) }}" class="mb-3" />

        @if($product->image_url)
        <div class="mb-3">
            <img src="{{ Storage::url($product->image_url) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded">
        </div>
        @endif

        <flux:input type="file" label="Image" name="image" class="mb-3" />

        {{-- Hidden input agar is_active selalu terkirim --}}
        <input type="hidden" name="is_active" value="0" />
        <flux:checkbox label="Active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} />

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900">Products</h1>
                <p class="text-gray-600 mt-2">Manage your product inventory</p>
            </div>

            <!-- Success Message -->
            @if(session()->has('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-start">
                    <svg class="w-5 h-5 text-green-600 mt-0.5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-green-800">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Create Button -->
            <div class="mb-6">
                <a href="{{ route('product.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create New Product
                </a>
            </div>

            <!-- Products Table/Grid -->
            @if ($products->isEmpty())
                <div class="bg-white rounded-lg shadow p-8 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                    <p class="text-gray-600 text-lg mb-4">No products found</p>
                    <a href="{{ route('product.create') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Create your first product →</a>
                </div>
            @else
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">ID</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Price</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Description</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($products as $product)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $product->id }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $product->qty }}</td>
                                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">${{ number_format($product->price, 2) }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($product->description, 50) }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold py-1 px-3 rounded text-sm transition">Edit</a>
                                                <form action="{{ route('product.destroy', ['product' => $product]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 font-semibold py-1 px-3 rounded text-sm transition">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
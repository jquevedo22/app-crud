<!DOCTYPE html>  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
            
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Create Product</h1>
                <p class="text-gray-600 text-sm mt-2">Add a new product to your inventory</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <h3 class="text-red-800 font-semibold text-sm mb-2">Please fix the following errors:</h3>
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-700 text-sm">• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('product.store') }}" method="POST" class="space-y-5" autocomplete="off">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900 mb-2">Product Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter product name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                </div>

                <div>
                    <label for="qty" class="block text-sm font-medium text-gray-900 mb-2">Quantity</label>
                    <input 
                        type="number" 
                        id="qty" 
                        name="qty"
                        value="{{ old('qty') }}"
                        placeholder="Enter quantity"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-900 mb-2">Price</label>
                    <input 
                        type="number" 
                        id="price" 
                        name="price"
                        value="{{ old('price') }}"
                        placeholder="Enter price"
                        step="0.01"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-900 mb-2">Description</label>
                    <textarea 
                        id="description" 
                        name="description"
                        placeholder="Enter product description (optional)"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                    >{{ old('description') }}</textarea>
                </div>
                
                <div class="flex gap-3 pt-4">
                    <button 
                        type="submit" 
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-sm"
                    >
                        Save Product
                    </button>
                    <a 
                        href="{{ route('product.index') }}" 
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-200 text-center"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
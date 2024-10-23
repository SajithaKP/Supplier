<x-nav-link :active='request()->is("/")?"bg-gray-900":""' href="/">Home</x-nav-link>
<x-nav-link :active='request()->is("suppliers")?"bg-gray-900":""' href="{{route('suppliers.index')}}">Supplier</x-nav-link>
<x-nav-link :active='request()->is("items")?"bg-gray-900":""' href="{{route('items.index')}}">Items</x-nav-link>
<x-nav-link :active='request()->is("purchaseorders")?"bg-gray-900":""' href="{{route('purchaseorders.index')}}">order</x-nav-link>
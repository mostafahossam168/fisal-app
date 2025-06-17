<x-mail::message>
    # مرحبا بك

    تم انشاء منتج جديد : {{ $product->name }}

    <x-mail::button :url="route('products.show', $product->id)">
        عرض
    </x-mail::button>

    شكرا,<br>
    {{ config('app.name') }}
</x-mail::message>

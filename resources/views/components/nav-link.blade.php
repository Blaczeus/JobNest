@props(['active' => false,])
<a class="py-2 px-4 rounded-xl transition-colors duration-200 {{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
  aria-current="{{ $active ? 'page' : 'false' }}"
  {{ $attributes }}>
  {{ $slot }}
</a>

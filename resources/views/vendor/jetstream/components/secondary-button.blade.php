<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-stone-300 rounded-md font-semibold text-xs text-stone-700 uppercase tracking-widest shadow-sm hover:text-stone-500 focus:outline-none focus:border-stone-300 focus:ring focus:ring-stone-200 active:text-stone-800 active:bg-stone-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>

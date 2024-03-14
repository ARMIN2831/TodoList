<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])


    </head>
    <body class="antialiased">





    <div x-data='{
    open: false,
    options: ["armin", "eslami", "mobina"],
    search: "",
    filteredOptions: function() {
        return this.options.filter(option => option.toLowerCase().includes(this.search.toLowerCase()));
    }
}'>
        <input type="text" x-model="search" x-on:click="open = true" placeholder="Search..." class="border rounded p-2">

        <div x-show="open" x-on:click.away="open = false" style="position: relative;">
            <ul style="list-style: none; padding: 0; max-height: 200px; overflow-y: auto;" class="border rounded bg-white shadow">
                <template x-if="filteredOptions().length > 0">
                    <template x-for="option in filteredOptions()" :key="option">
                        <li @click="open = false; $dispatch('selected', option)" style="cursor: pointer; padding: 8px;" x-text="option"></li>
                    </template>
                </template>
                <template x-if="filteredOptions().length === 0 && search !== ''">
                    <li class="p-2">No results found.</li>
                </template>
            </ul>
        </div>
    </div>









    </body>
</html>

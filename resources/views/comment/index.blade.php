<x-app-layout>
    <!-- Header de listado de Spaces -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Comentarios') }}
        </h2>
    </x-slot>


<!-- Listado de Espacios -->
    <div class="py-12">
        @if (session('status'))
            <div id="status-message" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{!! session('status') !!}</span>
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('status-message').style.display = 'none';
                }, 3000);
            </script>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-2">
                    
                    <!-- Se muestran los elementos en forma de Card -->
                    @each('components.card-comments',$comments,'comment')
                    {{ $comments->links() }} <!-- Paginación -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

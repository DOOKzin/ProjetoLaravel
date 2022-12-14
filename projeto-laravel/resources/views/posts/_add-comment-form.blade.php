@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments" >
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">Gostaria de participar?</h2>

            </header>
            <div class="mt-6">
                <textarea 
                    name="body" 
                    class="w-full text-sm focus:outline-none focus:ring" 
                    cols="30" 
                    rows="7" 
                    placeholder="Escreva alguma coisa"
                    required></textarea>

                    @error('body')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
            </div>

            <div class="flex justify-end mt-5 pt-3 border-t border-gray-200 ">
                <x-form.button>Postar</x-form.button>
            </div>

        </form>
    </x-panel>
    @else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Registre-se</a> ou <a href="/login" class="hover:underline">Logue em sua conta</a> para comentar.
    </p>
@endauth
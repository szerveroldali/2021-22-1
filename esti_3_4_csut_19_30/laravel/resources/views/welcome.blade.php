<x-guest-layout>
    <x-slot name="title">
        Főoldal
    </x-slot>

    @php
        $posts = [
            [
                'title' => 'Bejegyzés 1',
                'author' => 'Szerző',
                'text' => 'Ez lesz a bejegyzés szövege',
                'categories' => ['Kategória1', 'Kategória2']
            ],
            [
                'title' => 'Bejegyzés 2',
                'author' => 'Szerző',
                'text' => 'Ez lesz a bejegyzés szövege',
                'categories' => ['Kategória1', 'Kategória2']
            ],
            [
                'title' => 'Bejegyzés 3',
                'author' => 'Szerző',
                'text' => 'Ez lesz a bejegyzés szövege',
                'categories' => ['Kategória1', 'Kategória2']
            ],
            [
                'title' => 'Bejegyzés 4',
                'author' => 'Szerző',
                'text' => 'Ez lesz a bejegyzés szövege',
                'categories' => ['Kategória1', 'Kategória2']
            ],
            [
                'title' => 'Bejegyzés 5',
                'author' => 'Szerző',
                'text' => 'Ez lesz a bejegyzés szövege',
                'categories' => ['Kategória1', 'Kategória2']
            ],
        ]
    @endphp

    <div class="container mx-auto p-3 lg:px-36">
        <div class="grid grid-cols-1 lg:grid-cols-2 mb-4">
            <div>
                <h1 class="font-bold my-4 text-4xl">Szerveroldali Blog</h1>
            </div>
            <div class="flex items-center gap-2 lg:justify-end">
                <a href="{{ route('categories.create') }}" class="bg-green-500 hover:bg-green-700 px-2 py-1 text-white"><i class="fas fa-plus-circle"></i> Új kategória</a>
                <a href="{{ route('posts.create') }}" class="bg-green-500 hover:bg-green-700 px-2 py-1 text-white"><i class="fas fa-plus-circle"></i> Új bejegyzés</a>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-6">
            <!-- Cardok -->
            <div class="col-span-4 lg:col-span-3">
                <h2 class="font-semibold text-3xl my-2">Minden bejegyzés</h2>
                <div class="grid grid-cols-3 gap-3">
                    @forelse ($posts as $post)
                        <div class="col-span-3 lg:col-span-1">
                            <img src="https://www.ispreview.co.uk/wp-content/uploads/london_city_2017_uk.jpg">
                            <div class="px-2.5 py-2 border-r border-l border-b border-gray-400 ">
                                <h3 class="text-xl mb-0.5 font-semibold">
                                    {{ $post['title'] }}
                                </h3>
                                <h4 class="text-gray-400">
                                    <span class="mr-2"><i class="fas fa-user"></i> {{ $post['author'] }}</span>
                                    <span><i class="far fa-calendar-alt"></i> Date</span>
                                </h4>
                                <p class="text-gray-600 mt-1">
                                    {{ $post['text'] }}
                                </p>
                                <button class="bg-blue-500 hover:bg-blue-600 px-1.5 py-1 text-white mt-3 font-semibold">Elolvasom <i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 px-2 py-4 bg-blue-100">
                            Jelenleg még nincsenek bejegyzések!
                        </div>
                    @endforelse

                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-span-4 lg:col-span-1">
                <h2 class="font-semibold text-3xl my-2">Menü</h2>
                <div class="grid grid-cols-1 gap-3">
                    <div class="border px-2.5 py-2 border-gray-400">
                        <form>
                            <label for="name" class="block font-medium text-xl text-gray-700">Keresés</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300" placeholder="Bejegyzés címe">
                            <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-600 text-gray-100 font-semibold px-2 py-1"><i class="fas fa-search"></i> Keresés</button>
                        </form>
                    </div>
                    <div class="border px-2.5 py-2 border-gray-400">
                        <h3 class="mb-0.5 text-xl font-semibold">
                            Kategóriák
                        </h3>
                        <div class="flex flex-row flex-wrap gap-1 mt-3">
                            <a href="#" class="py-0.5 px-1.5 font-semibold bg-blue-800 text-white text-sm">kategória1</a>
                            <a href="#" class="py-0.5 px-1.5 font-semibold bg-red-800 text-white text-sm">kat2</a>
                            <a href="#" class="py-0.5 px-1.5 font-semibold bg-yellow-800 text-white text-sm">kategória3</a>
                            <a href="#" class="py-0.5 px-1.5 font-semibold bg-green-800 text-white text-sm">kategória4</a>
                        </div>
                    </div>
                    <div class="border px-2.5 py-2 border-gray-400">
                        <h3 class="mb-0.5 text-xl font-semibold">
                            Statisztika
                        </h3>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-user"></i></span>Felhasználók: 1</li>
                            <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Bejegyzések: 1
                            </li>
                            <li><span class="fa-li"><i class="fas fa-comments"></i></span>Hozzászólások: 3
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-guest-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1>Contenu du Répertoire "{{ $path }}"</h1><br />
                    <div class="flex mb-4">



                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <div class="ml-2">
                                    Nouveau fichier
                                </div>
                            </div>
                        </button>
                        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Nouveau Fichier
                                        </h3>
                                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form id="dockerCommandForm" class="space-y-4" action="{{ route('create.docker.file') }}" method="post" autocomplete="off">
                                            @csrf                                            
                                            <div>
                                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            </div>
                                            <button type="button" onclick="createDockerFile()" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button data-modal-target="authentication-modal-folder" data-modal-toggle="authentication-modal-folder" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                </svg>
                                <div class="ml-2">
                                    Nouveau dossier
                                </div>
                            </div>
                        </button>
                        <div id="authentication-modal-folder" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Nouveau Dossier
                                        </h3>
                                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal-folder">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form id="dockerCommandFolder" class="space-y-4" action="{{ route('create.docker.folder') }}" method="post" autocomplete="off">
                                            @csrf                                            
                                            <div>
                                                <input type="text" name="nameFolder" id="nameFolder" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            </div>
                                            <button type="button" onclick="createDockerFolder()" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> 
                    <ul>
                        @foreach($contents as $content)
                            @php
                                $fullPath = rtrim($path . '/' . $content, '/');
                                $isDirectory = substr($content, -1) === '/';
                            @endphp
                        <li>
                            @if($isDirectory)
                            <a href="{{ route('directory.show', ['path' => rtrim($path, '/') . '/' . urlencode($content)]) }}" class="underline">
                                <div class="flex mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                    </svg>
                                    <div class="ml-4">
                                        {{ $content }}
                                    </div>
                                </div>
                            </a>
                            @else
                                <div class="flex mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                    <div class="ml-4">
                                        {{ $content }}
                                    </div>
                                </div>
                            @endif
                        </li>                        
                        @endforeach
                    </ul>                
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalButtons = document.querySelectorAll('[data-modal-toggle]');
        modalButtons.forEach(button => {
            const targetModalId = button.getAttribute('data-modal-target');
            const targetModal = document.getElementById(targetModalId);

            if (targetModal) {
                button.addEventListener('click', function () {
                    targetModal.classList.toggle('hidden');
                });
            }
        });

        const closeModalButtons = document.querySelectorAll('[data-modal-hide]');
        closeModalButtons.forEach(button => {
            const targetModalId = button.getAttribute('data-modal-hide');
            const targetModal = document.getElementById(targetModalId);

            if (targetModal) {
                button.addEventListener('click', function () {
                    targetModal.classList.add('hidden');
                });
            }
        });
    });


    function createDockerFile() {
        const name = document.getElementById('name').value;
        // Soumettez le formulaire avec AJAX
        fetch("{{ route('create.docker.file') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ name: name })
        })
        .then(response => response.json())
        .then(data => {
            // Gérez la réponse ici, par exemple, affichez un message à l'utilisateur
            //alert(data.message);
            window.location.reload();
        })
        .catch(error => {
            console.error('Erreur lors de l\'exécution de la commande Docker:', error);
            // Gérez les erreurs ici, par exemple, affichez un message d'erreur à l'utilisateur
            alert('Une erreur s\'est produite lors de l\'exécution de la commande Docker.');
            console.log(error);
        });
    }



    function createDockerFolder() {
        const name = document.getElementById('nameFolder').value;
        // Soumettez le formulaire avec AJAX
        fetch("{{ route('create.docker.folder') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ name: name })
        })
        .then(response => response.json())
        .then(data => {
            // Gérez la réponse ici, par exemple, affichez un message à l'utilisateur
            //alert(data.message);
            window.location.reload();
        })
        .catch(error => {
            console.error('Erreur lors de l\'exécution de la commande Docker:', error);
            // Gérez les erreurs ici, par exemple, affichez un message d'erreur à l'utilisateur
            alert('Une erreur s\'est produite lors de l\'exécution de la commande Docker.');
            console.log(error);
        });
    }
</script>


</x-app-layout>

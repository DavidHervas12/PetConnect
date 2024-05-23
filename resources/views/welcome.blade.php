<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-full">
  <div class="min-h-full">
    <nav class="bg-gradient-to-r from-lime-500 to-green-600 shadow-lg">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img src="{{asset("img/logo_blanco.png")}}" alt="logo" class="h-12 w-12" />
            </div>
            <div class="hidden md:block">
              <div class="ml-7 flex items-baseline space-x-4">
                <a href="#" class="text-white rounded-md px-3 py-2 text-3xl font-bold -ml-8">PetConnect</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6 space-x-4">
              <a href="{{ route('contacts.index') }}"
                class="bg-white text-lime-900 rounded-md px-3 py-2 text-sm font-medium shadow hover:bg-lime-100 transition">Login</a>
              <a href="{{ route('register') }}"
                class="text-white hover:text-gray-300 rounded-md px-3 py-2 text-sm font-medium transition">Sign up</a>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <button type="button"
              class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 focus:outline-none">
              <svg class="block h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>

    <header
      class="bg-gradient-to-r from-lime-100 to-green-100 h-max border-b-2 border-gray-300 flex justify-center items-center">
      <div class="px-4 py-6 sm:px-6 lg:px-8 flex flex-col items-center text-center">
        <h1 class="text-6xl font-extrabold tracking-tight text-green-900 mt-8">
          Un CRM, mil finales felices
        </h1>
        <h2 class="text-2xl font-medium tracking-tight text-lime-600 mb-8">
          Bienvenido a PetConnect, tu aliado en la gestión eficiente y humana de las relaciones en el mundo de las
          protectoras de animales.
        </h2>
        <img src="{{ asset('img/captura.png') }}" alt="logo" class="w-full max-w-3xl mt-4 mb-10 rounded-lg shadow-lg" />
      </div>
    </header>

    <main class="p-8">
      <div
        class="mx-auto max-w-7xl py-6 text-center rounded-md border-2 border-lime-600 bg-gradient-to-r from-lime-500 to-green-600 text-white shadow-md">
        <h1 class="text-4xl font-bold tracking-tight w-full">Sobre nosotros</h1>
        <p
          class="text-xl font-normal tracking-tight w-full md:w-11/12 lg:w-10/12 xl:w-9/12 2xl:w-8/12 mx-auto mt-4 leading-relaxed">
          En PetConnect, nos enorgullecemos de ser mucho más que un simple CRM. Somos tu aliado comprometido en la
          gestión eficiente y humana de las relaciones en el apasionante mundo de las protectoras de animales.

          Nos dedicamos a proporcionar las herramientas necesarias para que las organizaciones protectoras de animales
          puedan alcanzar sus metas y cumplir su misión de manera efectiva. Con nuestra plataforma, facilitamos la
          conexión entre las protectoras, los voluntarios y las personas que desean adoptar, creando un ecosistema donde
          cada mascota encuentra su hogar ideal.

          Nuestra filosofía se basa en el amor y el respeto hacia todos los seres vivos. Creemos en el poder de la
          tecnología para transformar vidas y en la importancia de mantener siempre presente el factor humano en cada
          interacción.

          En PetConnect, cada historia tiene mil finales felices. Desde el momento en que una mascota es registrada en
          nuestra plataforma hasta que encuentra un hogar lleno de amor, estamos ahí, brindando apoyo y facilitando el
          proceso.

          Únete a nuestra comunidad de personas comprometidas con el bienestar animal y descubre cómo juntos podemos
          crear un mundo donde todos los animales sean amados y respetados. ¡Bienvenido a PetConnect, donde cada
          conexión es un paso hacia un final feliz!
        </p>
      </div>

      <div class="mt-12">
        <h2 class="text-4xl font-bold tracking-tight mb-6">Reseñas</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Reseña 1 -->
          <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-lg font-semibold mb-4">"¡Una plataforma increíble para conectar con las protectoras de
              animales! ¡Gracias a PetConnect, encontré a mi mejor amigo peludo!"</p>
            <p class="text-sm text-gray-500">- María López</p>
          </div>

          <!-- Reseña 2 -->
          <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-lg font-semibold mb-4">"PetConnect ha simplificado enormemente nuestra labor en la
              protectora. Es una herramienta imprescindible para nosotros."</p>
            <p class="text-sm text-gray-500">- David García</p>
          </div>

          <!-- Reseña 3 -->
          <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-lg font-semibold mb-4">"¡Increíble atención al cliente! Siempre dispuestos a ayudar y
              resolver cualquier problema que surja."</p>
            <p class="text-sm text-gray-500">- Laura Martínez</p>
          </div>
        </div>
    </main>

    <footer class="p-4 bg-green-700 sm:p-6">
      <div class="mx-auto max-w-screen-xl">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
            <a href="https://flowbite.com" class="flex items-center">
              <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PetConnect</span>
            </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase text-white">Resources</h2>
              <ul class="text-gray-200">
                <li class="mb-4">
                  <a href="https://flowbite.com" class="hover:underline">Petconnect</a>
                </li>
                <li>
                  <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase text-white">Follow us</h2>
              <ul class="text-gray-200">
                <li class="mb-4">
                  <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                </li>
                <li>
                  <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase text-white">Legal</h2>
              <ul class="text-gray-200">
                <li class="mb-4">
                  <a href="#" class="hover:underline">Privacy Policy</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto border-gray-300 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-300 sm:text-center">© 2022 <a href="https://flowbite.com"
              class="hover:underline">PetConnect</a>. All Rights Reserved.</span>
          <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="#" class="text-gray-300 hover:text-white">
              <span class="sr-only">Twitter</span>
              <!-- Twitter Icon -->
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                  clip-rule="evenodd" />
              </svg>
            </a>
            <a href="#" class="text-gray-300 hover:text-white">
              <span class="sr-only">Facebook</span>
              <!-- Facebook Icon -->
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                  clip-rule="evenodd" />
              </svg>
            </a>
            <a href="#" class="text-gray-300 hover:text-white">
              <span class="sr-only">Instagram</span>
              <!-- Instagram Icon -->
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </footer>

  </div>
</body>

</html>

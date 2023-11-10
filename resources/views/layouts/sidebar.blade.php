<div @click.away="open = false"
    class="dark-mode:text-gray-200 dark-mode:bg-gray-800 flex w-full flex-shrink-0 flex-col bg-white text-gray-700 md:w-64"
    x-data="{ open: false }">
    <div class="flex flex-shrink-0 flex-row items-center justify-between px-8 py-4">
        <button class="focus:shadow-outline rounded-lg focus:outline-none md:hidden" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                <path x-show="!open" fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <nav :class="{ 'block': open, 'hidden': !open }" class="flex-grow px-4 pb-4 md:block md:overflow-y-auto md:pb-0">
        <a class="dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none"
            href="{{ route('admin.role') }}">Role</a>
        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none"
            href="{{ route('admin.expense') }}">Expense</a>
        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none"
            href="{{ route('admin.permission.index') }}">Permissions</a>
        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none"
            href="#">Contact</a>
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:block">
                <span>Dropdown</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                    class="ml-1 mt-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg">
                <div class="dark-mode:bg-gray-700 rounded-md bg-white px-2 py-2 shadow">
                    <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                        href="#">Link #1</a>
                    <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                        href="#">Link #2</a>
                    <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                        href="#">Link #3</a>
                </div>
            </div>
        </div>
    </nav>
</div>

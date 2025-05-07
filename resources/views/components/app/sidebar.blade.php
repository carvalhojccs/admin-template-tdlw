<div class="min-w-fit">
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-gray-900/30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex lg:flex! flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:w-64! shrink-0 bg-white dark:bg-gray-800 p-4 transition-all duration-200 ease-in-out {{ $variant === 'v2' ? 'border-r border-gray-200 dark:border-gray-700/60' : 'rounded-r-2xl shadow-xs' }}"
        :class="sidebarOpen ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <x-img.logo :width=144 :height=48/>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                        aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">MENU</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <x-menu.dropdown title="Dashboard" :segments="[
                        'dashboard',
                        'analytics',
                        'fintech',
                    ]">
                        <x-menu.menu-item title="Main" route="{{ route('dashboard') }}" />
                        <x-menu.menu-item title="Analytics" route="{{-- route('users.index') --}}" />
                        <x-menu.menu-item title="Fintech" route="{{-- route('professionals.index') --}}" />
                        
                    </x-menu.dropdown>

                    <!-- Cadastros -->
                    <x-menu.dropdown title="Cadastros" :segments="[
                        'orgao',
                        'users',
                        'professionals',
                        'suppliers',
                        'departments',
                        'manufacturers',
                        'temperatures',
                    ]">
                        <x-menu.menu-item title="Órgão" route="organs.index" />
                        <x-menu.menu-item title="Usuário" route="{{-- route('users.index') --}}" />
                        <x-menu.menu-item title="Profissional" route="{{-- route('professionals.index') --}}" />
                        <x-menu.menu-item title="Fornecedor" route="{{-- route('suppliers.index') --}}" />
                        <x-menu.menu-item title="Departamento" route="{{-- route('departments.index') --}}" />
                        <x-menu.menu-item title="Fabricante" route="{{-- route('manufacturers.index') --}}" />
                        <x-menu.menu-item title="Temperatura" route="{{-- route('temperatures.index') --}}" />
                    </x-menu.dropdown>
                    <!-- Cadastros -->
                    <!-- Material -->
                    <x-menu.dropdown title="Material" segment="addresses">
                        <x-menu.menu-item title="Endereço" route="addresses.index" />
                    </x-menu.dropdown>
                    <!-- Material -->

                    <!-- Community -->
                    <x-menu.dropdown title="Community" :segments="[
                        'community',
                        'users-tabs',
                        'users-tiles',
                        'profile',
                        'feed',
                        'forum',
                        'forum-post',
                        'meetups',
                        'meetups-post',
                    ]">
                        <x-menu.menu-item title="Users - Tabs" route="{{-- route('users-tabs') --}}" />
                        <x-menu.menu-item title="Users - Tiles" route="{{-- route('users-tiles') --}}" />
                        <x-menu.menu-item title="Profile" route="{{-- route('profile') --}}" />
                        <x-menu.menu-item title="Feed" route="{{-- route('feed') --}}" />
                        <x-menu.menu-item title="Forum" route="{{-- route('forum') --}}" />
                        <x-menu.menu-item title="Forum - Post" route="{{-- route('forum-post') --}}" />
                        <x-menu.menu-item title="Meetups" route="{{-- route('meetups') --}}" />
                        <x-menu.menu-item title="Meetups - Post" route="{{-- route('meetups-post') --}}" />
                    </x-menu.dropdown>

                    <!-- Finance -->
                    <x-menu.dropdown title="Finance" :segments="[
                        'finance',
                        'credit-cards',
                        'transactions',
                        'transaction-details',
                    ]">
                        <x-menu.menu-item title="Cards" route="{{-- route('credit-cards') --}}" />
                        <x-menu.menu-item title="Transactions" route="{{-- route('transactions') --}}" />
                        <x-menu.menu-item title="Transaction Details" route="{{-- route('transaction-details') --}}" />
                    </x-menu.dropdown>
                    

                    <!-- Job Board -->
                    <x-menu.dropdown title="Job Board" :segments="[
                        'job',
                        'job-listing',
                        'job-post',
                        'company-profile',
                    ]">
                        <x-menu.menu-item title="Listing" route="{{-- route('job-listing') --}}" />
                        <x-menu.menu-item title="Post" route="{{-- route('job-post') --}}" />
                        <x-menu.menu-item title="Company Profile" route="{{-- route('company-profile') --}}" />
                    </x-menu.dropdown>

                    <!-- Tasks -->
                    <x-menu.dropdown title="Tasks" :segments="[
                        'tasks',
                        'tasks-kanban',
                        'tasks-list',
                    ]">
                        <x-menu.menu-item title="Kanban" route="{{-- route('tasks-kanban') --}}" />
                        <x-menu.menu-item title="List" route="{{-- route('tasks-list') --}}" />
                    </x-menu.dropdown>

                    <!-- Messages -->
                    <x-menu.single title="Messages" segment='messages' route="{{-- route('messages') --}}"/>
                    
                    <!-- Inbox -->
                    <x-menu.single title="Inbox" segment='inbox' route="{{-- route('inbox') --}}"/>
                    
                    <!-- Calendar -->
                    <x-menu.single title="Calendar" segment='calendar' route="{{-- route('calendar') --}}"/>
                    
                    <!-- Campaigns -->
                    <x-menu.single title="Campaigns" segment='campaigns' route="{{-- route('campaigns') --}}"/>
                    
                    <!-- Settings -->
                    <x-menu.dropdown title="Settings" :segments="[
                        'settings',
                        'settings-profile',
                        'settings-billing',
                        'settings-notifications',
                        'settings-privacy',
                        'settings-security',
                        'settings-activity-log',
                    ]">
                        <x-menu.menu-item title="Profile" route="{{-- route('settings-profile') --}}" />
                        <x-menu.menu-item title="Billing" route="{{-- route('settings-billing') --}}" />
                        <x-menu.menu-item title="Notifications" route="{{-- route('settings-notifications') --}}" />
                        <x-menu.menu-item title="Privacy" route="{{-- route('settings-privacy') --}}" />
                        <x-menu.menu-item title="Security" route="{{-- route('settings-security') --}}" />
                        <x-menu.menu-item title="Activity Log" route="{{-- route('settings-activity-log') --}}" />
                    </x-menu.dropdown>

                    <!-- Utility -->
                    <x-menu.dropdown title="Utility" :segments="[
                        'utility',
                        'changelog',
                        'roadmap',
                        'faqs',
                        'empty-state',
                        '404',
                    ]">
                        <x-menu.menu-item title="Changelog" route="{{-- route('changelog') --}}" />
                        <x-menu.menu-item title="Roadmap" route="{{-- route('roadmap') --}}" />
                        <x-menu.menu-item title="FAQs" route="{{-- route('faqs') --}}" />
                        <x-menu.menu-item title="Empty State" route="{{-- route('empty-state') --}}" />
                        <x-menu.menu-item title="404" route="{{-- route('404') --}}" />
                    </x-menu.dropdown>
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="w-12 pl-4 pr-3 py-2">
                <button
                    class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400 transition-colors"
                    @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500 sidebar-expanded:rotate-180"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15 16a1 1 0 0 1-1-1V1a1 1 0 1 1 2 0v14a1 1 0 0 1-1 1ZM8.586 7H1a1 1 0 1 0 0 2h7.586l-2.793 2.793a1 1 0 1 0 1.414 1.414l4.5-4.5A.997.997 0 0 0 12 8.01M11.924 7.617a.997.997 0 0 0-.217-.324l-4.5-4.5a1 1 0 0 0-1.414 1.414L8.586 7M12 7.99a.996.996 0 0 0-.076-.373Z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>

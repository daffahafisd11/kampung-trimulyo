@props(['name', 'size' => 'h-5 w-5'])

<svg class="{{ $size }} shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
    @switch($name)
        @case('home')
            <path d="m3 10 9-7 9 7" />
            <path d="M5 9v11h14V9M9 20v-6h6v6" />
            @break
        @case('building')
            <path d="M3 21h18M5 21V7l7-4 7 4v14M9 10h.01M15 10h.01M9 14h.01M15 14h.01M10 21v-3h4v3" />
            @break
        @case('user')
            <circle cx="12" cy="8" r="4" />
            <path d="M5 21a7 7 0 0 1 14 0" />
            @break
        @case('users')
            <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
            <path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
            @break
        @case('wallet')
            <path d="M20 8V5a2 2 0 0 0-2-2H5a3 3 0 0 0 0 6h15v10a2 2 0 0 1-2 2H5a3 3 0 0 1-3-3V6" />
            <path d="M20 13h-4a2 2 0 0 0 0 4h4M16 15h.01" />
            @break
        @case('megaphone')
            <path d="m3 11 18-5v12L3 13v-2ZM11 14l1.5 6H8l-1.5-7M21 9v6" />
            @break
        @case('store')
            <path d="M3 10v11h18V10M2 10l2-7h16l2 7M2 10a3 3 0 0 0 6 0 3 3 0 0 0 6 0 3 3 0 0 0 6 0 2 2 0 0 0 2 0M10 21v-6h4v6" />
            @break
        @case('newspaper')
            <path d="M4 4h16v17H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2ZM8 8h8M8 12h8M8 16h4M2 8h2" />
            @break
        @case('calendar')
            <rect x="3" y="5" width="18" height="16" rx="2" />
            <path d="M16 3v4M8 3v4M3 10h18" />
            @break
        @case('globe')
            <circle cx="12" cy="12" r="10" />
            <path d="M2 12h20M12 2a15 15 0 0 1 0 20M12 2a15 15 0 0 0 0 20" />
            @break
        @case('lock')
            <rect x="4" y="11" width="16" height="10" rx="2" />
            <path d="M8 11V7a4 4 0 1 1 8 0v4M12 15v2" />
            @break
        @case('logout')
            <path d="M10 17l5-5-5-5M15 12H3M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6" />
            @break
        @case('folder')
            <path d="M3 6a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6Z" />
            @break
        @case('tag')
            <path d="M20.6 13.4 13 21l-10-10V3h8l9.6 9.6a.6.6 0 0 1 0 .8Z" />
            <circle cx="7.5" cy="7.5" r="1" />
            @break
        @case('briefcase')
            <rect x="3" y="7" width="18" height="14" rx="2" />
            <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18M10 12v2h4v-2" />
            @break
        @case('plus')
            <path d="M12 5v14M5 12h14" />
            @break
        @case('check')
            <path d="m5 12 4 4L19 6" />
            @break
        @case('circle-check')
            <circle cx="12" cy="12" r="10" />
            <path d="m8 12 2.5 2.5L16 9" />
            @break
        @case('info')
            <circle cx="12" cy="12" r="10" />
            <path d="M12 11v5M12 8h.01" />
            @break
        @case('alert')
            <path d="m10.3 3.9-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.7-3.1l-8-14a2 2 0 0 0-3.4 0Z" />
            <path d="M12 9v4M12 17h.01" />
            @break
        @case('arrow-left')
            <path d="m12 19-7-7 7-7M5 12h14" />
            @break
        @case('menu')
            <path d="M4 6h16M4 12h16M4 18h16" />
            @break
        @case('clipboard')
            <rect x="5" y="4" width="14" height="17" rx="2" />
            <path d="M9 4.5V3h6v1.5M9 10h6M9 14h6M9 18h3" />
            @break
        @case('clock')
            <circle cx="12" cy="12" r="10" />
            <path d="M12 6v6l4 2" />
            @break
        @case('edit')
            <path d="m16 4 4 4M4 20l4-.8L19 8a2.1 2.1 0 0 0-3-3L5 16l-1 4Z" />
            @break
        @case('search')
            <circle cx="11" cy="11" r="7" />
            <path d="m20 20-4-4" />
            @break
    @endswitch
</svg>

<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <defs>
        <linearGradient id="linkGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#6366f1;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#a855f7;stop-opacity:1" />
        </linearGradient>
    </defs>

    <circle cx="50" cy="50" r="45" fill="none" stroke="currentColor" stroke-width="2" stroke-dasharray="4 4" class="opacity-20" />

    <rect x="25" y="35" width="35" height="12" rx="6" fill="url(#linkGradient)" transform="rotate(-45 25 35)" />

    <rect x="40" y="65" width="35" height="12" rx="6" fill="url(#linkGradient)" transform="rotate(-45 40 65)" />

    <circle cx="50" cy="50" r="6" fill="currentColor" />
</svg>

@props(['type' => 'info', 'message'])

@php
    function alertClasses($type)
    {
        switch ($type) {
            case 'success':
                return 'flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50';
            case 'error':
                return 'flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50';
            default:
                return 'flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50';
        }
    }
@endphp

<style>
    .progress-container {
        width: 100%;
        height: 5px;
        background-color: #f0f0f0;
        margin-bottom: 10px;
        position: relative;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        background-color: #E9BF34;
        animation: progress-animation 3s linear forwards;
        position: absolute;
        top: 0;
        right: 0;
    }

    @keyframes progress-animation {
        0% {
            left: 100%;
            width: 0%;
        }

        100% {
            left: 0%;
            width: 100%;
        }
    }
</style>

<div class="alert-container">
    <div class="progress-container">
        <div class="progress-bar"></div>
    </div>
    <div {{ $attributes->merge(['class' => alertClasses($type)]) }}>
        @if ($type === 'success')
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" data-slot="icon" aria-hidden="true" fill="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd"
                    d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                    fill-rule="evenodd"></path>
            </svg>
        @elseif ($type === 'error')
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
        @endif
        <span class="sr-only">{{ ucfirst($type) }}</span>
        <div>
            {{ $message }}
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        var alert = document.querySelector('.alert-container');
        if (alert) {
            alert.classList.add('hidden');
        }
    }, 3000);
</script>

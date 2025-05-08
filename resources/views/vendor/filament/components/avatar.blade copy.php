@props([
    'circular' => true,
    'size' => 'md',
])

@php
    $user = auth()->user();
    $avatarUrl = $user?->profile_photo_url ?? null;
    $name = $user?->name ?? 'User';

    $sizeClass = match ($size) {
        'sm' => 'h-6 w-6 text-xs',
        'md' => 'h-8 w-8 text-sm',
        'lg' => 'h-10 w-10 text-base',
        default => $size,
    };

    $shapeClass = $circular ? 'rounded-full' : 'rounded-md';
@endphp

@if ($avatarUrl)
    <img
        src="{{ $avatarUrl }}"
        alt="{{ $name }}"
        {{ $attributes->class([
            'fi-avatar object-cover object-center',
            $shapeClass,
            $sizeClass,
        ]) }}
    />
@else
    <div
        {{ $attributes->class([
            'fi-avatar flex items-center justify-center text-white font-medium',
            $shapeClass,
            $sizeClass,
        ]) }}
    >
        {{ $name }}
    </div>
@endif

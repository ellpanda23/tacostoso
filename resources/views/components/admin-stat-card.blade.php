@props(['title', 'quantity', 'icon', 'link' => null, 'color' => 'info'])

<div class="small-box bg-{{ $color }}">
    <div class="inner">
        <h3>{{ $quantity }}</h3>
        <p>{{ $title }}</p>
    </div>
    <div class="icon">
        <i class="{{ $icon }}"></i>
    </div>
    @if ($link)
        <a href="{{ $link }}" class="small-box-footer">Mas informacion <i
                class="fas fa-arrow-circle-right"></i></a>
    @endif
</div>

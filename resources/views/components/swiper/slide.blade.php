@props(['image', 'alt'])
<div class="swiper-slide">
  <figure>
    <img src="/assets/media/{{ $image }}" width="1800" height="1100" alt="{{ $alt }}" />
  </figure>
</div>
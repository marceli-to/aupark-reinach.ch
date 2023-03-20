@props(['image', 'alt'])
<div class="swiper-slide">
  <figure>
    <img src="/assets/media/{{ $image }}" width="1600" height="900" alt="{{ $alt }}" />
  </figure>
</div>
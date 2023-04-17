@props(['image', 'alt'])
<div class="swiper-slide">
  <figure>
    <picture>
      <source media="(min-width: 1200px)" srcset="/assets/media/{{ $image }}.jpg">        
      <source media="(min-width: 768px)" srcset="/assets/media/{{ $image }}-md.jpg">
      <source srcset="/assets/media/{{ $image }}-sm.jpg">
      <img src="/assets/media/{{ $image }}-sm.jpg" alt="{{ $alt }}" title="{{ $alt }}" height="1600" width="900">
    </picture>
  </figure>
</div>
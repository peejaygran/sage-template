@foreach ($images as $item)
    <div class="p-1">
        <img src="{{ $item['image'] }}" alt="" class="rounded w-100" style="object-fit: cover; object-position: top; height: 220px !important;" loading="lazy">
    </div>
@endforeach

{{-- <style>
    .banner-img {
        background-repeat: no-repeat;
        background-size: cover;
        height: 230px;
        border-radius: 10px;
    }

</style> --}}

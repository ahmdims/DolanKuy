<div class="modal fade modal-close-out" id="imagesModal-{{ $msme_data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal">Gambar {{ $msme_data->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <div class="row">
                        @if($msme_data->images->isNotEmpty())
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($msme_data->images as $index => $image)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="carousel-image rounded"
                                                style="width: 100%; height: 0; padding-top: 100%; position: relative; overflow: hidden;">
                                                <img src="{{ asset('storage/' . $image->path) }}"
                                                    class="d-block w-100 h-100 position-absolute"
                                                    style="object-fit: cover; top: 0; left: 0;">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        @else
                            <div class="rounded"
                                style="width: 100%; height: 0; padding-top: 100%; position: relative; overflow: hidden;">
                                <img src="{{ asset('img/banner/no_images.svg') }}"
                                    class="d-block w-100 h-100 position-absolute"
                                    style="object-fit: cover; top: 0; left: 0;">
                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
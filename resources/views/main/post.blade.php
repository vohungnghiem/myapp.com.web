@extends('main.layouts.master')

    @section('title', __('main.post'))
    @section('description',__('main.post'))
    @section('content')

    <section class="container mt-5 page post-page">
        <div class="row">
            <div class="col-lg-9 order-lg-12 ">
                <div class="post-content">
                    <h1>title post</h1>
                    <p class="p-foot">
                        <span>
                            <i class="far fa-clock"></i> 15 hours ago
                        </span>
                        <span>
                            <i class="fas fa-comment"></i> 5 Comments
                        </span>
                    </p>
                    <div class="content">
                        <p>Magnam vulputate! Phasellus platea nisi? Molestie est odio, expedita illo, quod consectetur fusce, omnis commodi saepe gravida dolore deleniti, blanditiis exercitationem expedita! Cupiditate iaculis? Repellat ac ad eleifend, platea
                            quae possimus rhoncus ratione metus, veritatis. Ultrices! Penatibus sapien taciti montes pretium litora proin malesuada pariatur ultricies? Doloremque malesuada? Pellentesque consequatur, euismod vel placeat reiciendis? Sem.
                            Assumenda, maxime nunc incidunt reprehenderit voluptate, commodi eget deserunt conubia facere. Massa assumenda purus eveniet ea reprehenderit netus nobis arcu repudiandae provident ullam pellentesque lorem justo illum conubia
                            possimus perferendis! Scelerisque? Aspernatur velit laboriosam ut error, ante consectetur, proin viverra harum, suspendisse ipsum quidem, consectetuer.</p>
                        <p>Magnam vulputate! Phasellus platea nisi? Molestie est odio, expedita illo, quod consectetur fusce, omnis commodi saepe gravida dolore deleniti, blanditiis exercitationem expedita! Cupiditate iaculis? Repellat ac ad eleifend, platea
                            quae possimus rhoncus ratione metus, veritatis. Ultrices! Penatibus sapien taciti montes pretium litora proin malesuada pariatur ultricies? Doloremque malesuada? Pellentesque consequatur, euismod vel placeat reiciendis? Sem.
                            Assumenda, maxime nunc incidunt reprehenderit voluptate, commodi eget deserunt conubia facere. Massa assumenda purus eveniet ea reprehenderit netus nobis arcu repudiandae provident ullam pellentesque lorem justo illum conubia
                            possimus perferendis! Scelerisque? Aspernatur velit laboriosam ut error, ante consectetur, proin viverra harum, suspendisse ipsum quidem, consectetuer.</p>
                        <p>Magnam vulputate! Phasellus platea nisi? Molestie est odio, expedita illo, quod consectetur fusce, omnis commodi saepe gravida dolore deleniti, blanditiis exercitationem expedita! Cupiditate iaculis? Repellat ac ad eleifend, platea
                            quae possimus rhoncus ratione metus, veritatis. Ultrices! Penatibus sapien taciti montes pretium litora proin malesuada pariatur ultricies? Doloremque malesuada? Pellentesque consequatur, euismod vel placeat reiciendis? Sem.
                            Assumenda, maxime nunc incidunt reprehenderit voluptate, commodi eget deserunt conubia facere. Massa assumenda purus eveniet ea reprehenderit netus nobis arcu repudiandae provident ullam pellentesque lorem justo illum conubia
                            possimus perferendis! Scelerisque? Aspernatur velit laboriosam ut error, ante consectetur, proin viverra harum, suspendisse ipsum quidem, consectetuer.</p>
                        <p>Magnam vulputate! Phasellus platea nisi? Molestiae est odio, expedita</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-1 post-cat">
                <h4 class="h-cat"><a href="">Cate child </a></h4>
                <h4 class="h-cat"><a href="">Cate child</a></h4>
            </div>


        </div>
    </section>
@endsection
@push('styles')

@endpush
@push('scripts')

@endpush

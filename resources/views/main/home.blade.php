@extends('main.layouts.master')

    @section('title', __('main.trangchu'))
    @section('description',__('main.trangchu'))
    @section('content')

    <section class="container mt-5 page home-page">
        <div class="ol">
            @foreach ($posts as $post)
            <div class="container-li">
                <div class="time">{{date('Y-m-d', strtotime($post->created_at))}}</div>
                @isset($post->seppost)
                    @foreach (explode("||",$post->seppost) as $item)
                    @php $p = explode("__",$item); @endphp
                    <div class="container-wrap">
                    <div class="container-item">
                        <h2 class="h2-title">
                            <span><a href="{{$p[1]}}">{{$p[2]}}</a></span>
                        </h2>
                        <p class="p-cat">
                            {{deQuySelected($categories,0,'',$p[0])}}
                        </p>
                        <div class="icon"><i class="fas fa-comment"></i></div>
                    </div>
                    <p class="p-des">
                        {{$p[3]}}
                    </p>
                    <p class="p-foot">
                        <span>
                            <i class="far fa-clock"></i> {{$p[4]}}
                        </span>
                        <span>
                            <i class="fas fa-comment"></i> 0 Comments
                        </span>
                    </p>
                    </div>
                    @endforeach
                @endisset

            </div>
            @endforeach
        </div>
    </section>
@endsection
@push('styles')

@endpush
@push('scripts')

@endpush

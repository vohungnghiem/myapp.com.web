@extends('main.layouts.master')

    @section('title', __('main.trangchu'))
    @section('description',__('main.trangchu'))
    @section('content')

    <section class="container mt-5 page home-page">
        <div class="ol">
            @foreach ($posts as $post)
            <div class="container-li">
                <div class="time">
                    {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                </div>
                @isset($post->seppost)
                    @foreach (explode("||",$post->seppost) as $item)
                    @php $p = explode("__",$item); @endphp
                    <div class="container-wrap">
                        <div class="container-item">
                            <h2 class="h2-title">
                                <span><a href="{{$p[2]}}">{{$p[3]}}</a></span>
                            </h2>
                            <p class="p-cat" >
                               <span class="cat" hcat="{{$p[1]}}"><i class="fas fa-file-export"></i></span>
                               <a href="muc/{{$p[1]}}"><i class="fas fa-ellipsis-h"></i> {{$p[0]}}</a>
                            </p>
                            <div class="icon"><i class="fas fa-comment"></i></div>
                        </div>
                        <p class="p-des">
                            {{$p[4]}}
                        </p>
                        <p class="p-foot">
                            <span>
                                <i class="far fa-clock"></i> {{$p[5]}}
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
        <div class="text-center mt-2 "><a class="btn btn-outline-dark btn-sm btn-more nextpage" href="1">More ...</a></div>
    </section>
@endsection
@push('styles')

@endpush
@push('scripts')
<script>
$(document).ready(function () {
    $(".btn-more").click(function(e){
        e.preventDefault();
        pagenumber = parseInt($(".nextpage").attr('href'));
        nextpage = pagenumber + 1;
        $.get("load/more?page="+nextpage, function(data, status){
            items = JSON.parse(data);
            var content = "";
            var listproup = "";
            $.each(items.data, function(index, item) {
                var post = item.seppost.split("||");
                post.forEach(element => {
                    var p = element.split("__");
                    listproup +=
                    '<div class="container-wrap">'+
                        '<div class="container-item">'+
                            '<h2 class="h2-title">'+
                                '<span><a href="'+p[2]+'">'+p[3]+'</a></span>'+
                            '</h2>'+
                            '<p class="p-cat">'+
                                '<span class="cat" hcat="'+p[1]+'"><i class="fas fa-file-export"></i></span>'+
                                '<a href="'+p[1]+'"><i class="fas fa-ellipsis-h"></i>'+ p[0]+'</a>'+
                            '</p>'+
                        ' <div class="icon"><i class="fas fa-comment"></i></div>'+
                        '</div>'+
                        '<p class="p-des">'+p[4]+'</p>'+
                        '<p class="p-foot">'+
                            '<span>'+
                                '<i class="far fa-clock"></i>'+ p[5]+
                            '</span>'+
                            '<span>'+
                                '<i class="fas fa-comment"></i> 0 Comments'+
                            '</span>'+
                        '</p>'+
                    '</div>';

                });
                content +=
                '<div class="container-li">' +
                    '<div class="time">'+item.created_at+'</div>'+
                    listproup +
                '</div>';
            });
            $('.ol').append(content);
            $(".nextpage").attr('href',nextpage);
        });
    });

    $('body').on('click','.cat', function () {
        var hcat =  $(this).attr('hcat');
        $.get("expend/"+hcat, function(data, status){
            console.log(data);
        });
        // var log =  $(this).attr('hcat');
        // console.log(log);
    });

});

</script>
@endpush

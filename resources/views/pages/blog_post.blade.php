@extends('layouts.app')

@section('content')

    <div class="everysinglepage" style="text-decoration: none; color: #ccc;">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    @if(Session()->get('lang')=='bangla')
                    <div class="post_details">
                        <div class="post_image">
                            <img src="{{ asset($single_post->post_image) }}" style="width:100%;" alt="">
                        </div>

                        <div class="post_category">
                            {{ $single_post->category_name_bn }}  <span style="float:right;">{{ $single_post->created_at }}</span>
                        </div>
                        <div class="post_Title">
                            <h3>{{ $single_post->post_title_bn }}</h3>
                        </div>
                        <div class="post_details">
                            <p style="text-align: justify;">{!! $single_post->post_details_bn !!}</p>
                        </div>
                    </div>
                    @else
                    <div class="post_details">
                        <div class="post_image">
                            <img src="{{ asset($single_post->post_image) }}" style="width:100%;" alt="">
                        </div>

                        <div class="post_category">
                            {{ $single_post->category_name_en }}  <span style="float:right;">{{ $single_post->created_at }}</span>
                        </div>
                        <div class="post_Title">
                            <h3>{{ $single_post->post_title_en }}</h3>
                        </div>
                        <div class="post_details">
                            <p style="text-align: justify;">{!! $single_post->post_details_en !!}</p>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="col-md-3">
                    @if(Session()->get('lang')=='bangla')
                    <div class="list-group">
                      <a href="{{ route('blog') }}" class="list-group-item list-group-item-action active">
                        সকল পোস্ট
                      </a>
                      @foreach($post as $row)
                      <a href="{{ URL('blog/post/'.$row->id.'/'.$row->post_title_bn_slug) }}" class="list-group-item list-group-item-action">{{ $row->post_title_bn }}</a>
                      @endforeach
                    </div>
                    @else
                    <div class="list-group">
                      <a href="{{ route('blog') }}" class="list-group-item list-group-item-action active">
                        All Posts
                      </a>
                      @foreach($post as $row)
                      <a href="{{ URL('blog/post/'.$row->id.'/'.$row->post_title_en_slug) }}" class="list-group-item list-group-item-action">{{ $row->post_title_en }}</a>
                      @endforeach
                    </div>
                    @endif

                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="panel"></div>
        </div>
    </div>

@endsection

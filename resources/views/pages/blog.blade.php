@extends('layouts.app')

@section('content')

    <div class="everysinglepage" style="text-decoration: none; color: #ccc;">
        <div class="container">
            <div class="row">
                @foreach($post as $row)
                <div class="col-md-4">

                    <div style="box-shadow: 0px 5px 20px rgba(0,0,0,0.1); text-align:center;padding-bottom:10px;margin-bottom:40px;" onMouseOver="this.style.opacity='90%'" onMouseOut="this.style.opacity='100%'">
                        <div style="text-decoration: none; color: #888;" >

                            @if(Session()->get('lang')=='bangla')
                            <a href="{{ URL('blog/post/'.$row->id.'/'.$row->post_title_bn_slug) }}"><img src="{{ asset($row->post_image) }}" alt="" style="width:100%;height:auto;margin-bottom:10px;"></a>
                            @else
                            <a href="{{ URL('blog/post/'.$row->id.'/'.$row->post_title_en_slug) }}"><img src="{{ asset($row->post_image) }}" alt="" style="width:100%;height:auto;margin-bottom:10px;"></a>
                            @endif


                            <h3>
                                @if(Session()->get('lang')=='bangla')
                                <a href="" style="text-decoration: none; color: #888;" onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#888'">{{ $row->post_title_bn }}</a>
                                @else
                                <a href="" style="text-decoration: none; color: #888;" onMouseOver="this.style.color='#000'" onMouseOut="this.style.color='#888'">{{ $row->post_title_en }}</a>
                                @endif
                            </h3>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            <div class="panel"></div>
        </div>
    </div>

@endsection

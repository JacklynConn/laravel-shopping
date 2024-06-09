@extends('frontend.master')

@section('main-content')

<main class="product-detail">

    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    
                    <div class="thumbnail">
                        <img src="../uploads/{{$newsDetail[0]->thumbnail}}" alt="khor" width="500px" height="456px">
                    </div>
                </div>
                <div class="col-5">
                    <div class="detail" >
                        <h5 class="title"># {{$newsDetail[0]->title}}</h5>
                                    <div   style="display:flex; justify-content:center; align-item:center;flex-direction: column;
                                }">
                                        <p >
                                            {{$newsDetail[0]->description}}
                                        </p>
                                        <p> <i class="fa-regular fa-thumbs-up"></i>: 0 | View :{{$newsDetail[0]->viewer}} </p>
                                        <p> </p>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        Popular News
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ( $PopularNews as $PopularNewsItem)
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                           
                            <a href="/news-detail={{$PopularNewsItem->id}}">
                                <img src="../uploads/{{$PopularNewsItem->thumbnail}}" alt="khor" height="357px">
                            </a>
                        </div>
                        <div class="detail">
                        <h5 class="title"><strong># {{$PopularNewsItem->title}}</strong></h5>
                                    <div class="ellipsis">
                                        <p >
                                            {{$PopularNewsItem->description}}
                                        </p>
                                       
                                        
                                    </div>
                        </div>
                    </figure>
                </div>
                @endforeach


               
            </div>
        </div>
    </section>

</main>

@endsection

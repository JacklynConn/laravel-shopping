@extends('frontend.master')

@section('main-content')

<main class="news">
    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach ( $ListNews as $ListNewsItem )
                        <div class="col-4">
                            <figure>
                                <div class="thumbnail">
                                    @if ( $ListNewsItem->viewer > 20 )

                                    <div class="stock-status">
                                        Popular
                                    </div>
                                    @else
                                    @php
                                    $createAt  = $ListNewsItem->created_at;
                                    $validityDate = date('d-m-Y H:i:s' , strtotime($createAt . '+ 1 days'));
                                    $currentdate = date('Y-m-d H:m:s');
                                    //create
                                
                                     if ($currentdate <= $validityDate){
                                        echo '  <div class="stock-status">
                                     News Feed
                                        </div>';
                                    }else 
                                        echo ' 
                                         ';
                                     
                                     
                                     
                                     
                          
                                @endphp
                                 
                                @endif
                               
                                    <a href="/news-detail={{$ListNewsItem->id}}">
                                        <img  src="../uploads/{{$ListNewsItem->thumbnail}}" alt="img">
                                    </a>
                                </div>
                                <div class="detail">
                                    
                                    <h5 class="title"># {{$ListNewsItem->title}}</h5>
                                    <div class="ellipsis">
                                        <p >
                                            {{$ListNewsItem->description}}
                                        </p>
                                    </div>
                                   
                                    
                                </div>
                            </figure>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
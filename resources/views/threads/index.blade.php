@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Forum Threads</div>

                    <div class="panel-body">

                        @foreach ($threads as $thread)
                            <div>
                                <div class="level">
                                     <h4 class="flex">
                                         <a href="{{ $thread->path() }}">
                                             {{ $thread->title }}
                                         </a>
                                     </h4>
                                <h4>
                                   <a href="{{ $thread ->path() }}">
                                       {{$thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
                                   </a>
                                </h4>
                                </div>
                                <div class="body">{{ $thread->body }}</div>
                            </article>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

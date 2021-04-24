<div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <img src="{{Gravatar::src($discussion->author->email)}}" id="discussion-gravatar" alt="">
            <strong class="ml-2">{{$discussion->author->name}}</strong>
        </div>
        <div>
            <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sm">View</a>
        </div>
    </div>
</div>

@foreach ($comments as $comment)
    <div class="display-comment">
        <div class="row">
            <div class="col-2">
                <span class="round"><img src="/frontend/images/users/{{$comment->user->userimage}}"
                        class="rounded-img-comment" width="80px" height="80px"></span>
            </div>
            <div class="col-10 pt-3 pl-2">
                <h5 class="align-self-start">{{ $comment->user->name }}</h5>
                <p class=" text-dark">{{ $comment->comment }}</p>
                <div class="frontend-form">
                    <form method="POST" action="{{ route('vedioreply.add') }}" class="form" accept-charset="UTF-8"
                    id="addUpdateArtistForm" enctype="multipart/form-data" data-reset="1" data-modal="1"
                    table-reload="mrclsDtToShowData" data-redirect="/artist">
                    @csrf

                            <div class="form-group">
                                <input type="hidden" name="track_id" value="{{ $data->id }}" />
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />

                                <textarea class="form-control ml-2" rows="1" name="comment" required placeholder="Enter a Reply"
                                id="description" ></textarea>
                                <small class="text-danger"></small>
                            </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-outline-danger mt-2"
                            style="font-size: 0.8em;" value="Reply" />
                        </div>
                    </form>

            </div>
            @include('frontend.secondreplies', ['comments' => $comment->replies])
        </div>
    </div>
@endforeach

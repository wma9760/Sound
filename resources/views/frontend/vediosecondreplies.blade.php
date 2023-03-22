@foreach ($comments as $comment)
    <div class="display-comment">
        <div class="row">
            <div class="col-2">
                <span class="round pt-2"><img src="/frontend/images/users/{{$comment->user->userimage}}"
                        class="align-self-start mr-3 rounded-img-comment" width="70px" height="70px"></span>
            </div>
            <div class="col-10 pt-3">
                <h5 class="align-self-start">{{ $comment->user->name }}</h5>
                <p class=" text-dark">{{ $comment->comment }}</p>
                <div class="frontend-form">
                    <form method="POST" action="{{ route('vedioreply.add') }}" accept-charset="UTF-8"
                        id="addUpdateArtistForm" enctype="multipart/form-data" data-reset="1" data-modal="1"
                        table-reload="mrclsDtToShowData" data-redirect="/artist">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="hidden" name="track_id" value="{{ $data->id }}" />
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                    <textarea class="form-control" rows="1" name="comment" required placeholder="Enter a Reply" cols="50"
                                        id="description"></textarea>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-outline-danger mt-2"
                                    value="Reply" />
                            </div>
                    </form>
                </div>

            </div>
            @include('frontend.vediosecondreplies', ['comments' => $comment->replies])
        </div>
    </div>
@endforeach

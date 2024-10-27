<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EcoCycle</title>
	@vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/font-awesome.min.css'])
    @vite(['resources/assets/css/global.css'])
    @vite(['resources/assets/css/awareness.css'])
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	@vite(['resources/assets/js/bootstrap.bundle.min.js'])

</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     @if($publication && $publication->comments && $publication->comments->count() > 0)
     @foreach($publication->comments as $comment)
    <div class="comment mt-2 p-3 bg-light shadow-sm rounded border-thick">
        <div class="d-flex justify-content-between align-items-center">
            <p class="small text-muted mb-0">{{ $comment->user->name }}</p>
            <div class="button-group">
                @if( Auth::id() !== $comment->user_id)
                    <form action="{{ route('comment.like', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn col_green mt-0 border-0" title="Like">
                            <i class="fa fa-solid fa-thumbs-up"></i> {{ $comment->likes }}
                        </button>
                    </form>
                @endif
                 @if(Auth::id() === $comment->user_id)  <!-- verif si auteur de comment  -->
                <button type="button" class="btn col_green mt-0 border-0" data-bs-toggle="modal" data-bs-target="#editModal-{{ $comment->id }}" title="Modifier">
                    <i class="fa fa-solid fa-pencil"></i>
                </button>
                <button type="button" class="btn col_green mt-0 border-0" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $comment->id }}" title="Supprimer">
                    <i class="fa fa-solid fa-trash"></i>
                </button>
                @endif
            </div>
        </div>
        <p class="comment-content" id="content-{{ $comment->id }}">{{ $comment->content }}</p>
        <p><small class="text-muted">{{ $comment->created_at->format('d F, Y') }}</small></p>
    </div>
    <div class="modal fade mt-3" id="deleteModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">this comment will be permanently deleted</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $comment->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success">Edit your comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <textarea name="content" class="form-control border-4" rows="10">{{ $comment->content }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn col_green mt-0 border-0 "><i class="fa fa-solid fa-check"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <p class="text-center text-success">Aucun commentaire pour cette publication.</p>
@endif


</body>
</html>

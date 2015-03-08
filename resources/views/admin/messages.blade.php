@if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">{{ trans('panel.lections.lection_title', ['number' => $lection->id, 'theme' => $lection->title]) }}</h4>
        <p class="card-category"><i>{{ trans('panel.lections.lection_theme', ['author' => $lection->author, 'time' => $lection->updated_at->diffForHumans()]) }}</i></p>
    </div>
    <div class="card-body">
        <div id="typography">
            <div class="card-title">
                <h2>{{ $lection->title }}</h2>
            </div>
            <div class="col-md-12">
                <div class="row">
                    {{ $lection->data }}
                </div>
            </div>
        </div>
    </div>
</div>
<h2>Categories <small>{{ count($categories) }}</small></h2>

@foreach($categories as $index => $category)

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">

            <div class="panel-heading" role="tab" id="heading-{{ $index }}">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{ str_slug($category->name) }}" aria-expanded="false" aria-controls="{{ str_slug($category->name) }}">
                        <h4>{{ $category->name }}</h4>
                    </a>
                </h4>
            </div>

            <div id="{{ str_slug($category->name) }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-{{ $index }}">
                <div class="panel-body">

                    <table class="table table-hover">
                        <thead>
                            <th>Content</th>
                        </thead>
                        <tbody>
                            @foreach($category->opinions as $opinion)
                                <tr>
                                    <td>
                                        {{ $opinion->content }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endforeach
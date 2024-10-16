<div class="left-sidebar">
    <h2>分類</h2>
    <div class="panel-group category-products" id="accordian">
        @foreach ($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#category-{{ $category->id }}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{ $category->name }}
                        </a>
                    </h4>
                </div>
                <div id="category-{{ $category->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach ($category->children as $child)
                                <li><a href="{{ route('product.show', $child->id) }}">{{ $child->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

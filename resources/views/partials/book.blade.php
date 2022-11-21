<article class="card" data-id="{{ $book->id_product }}">
<header>
  <h2><a href="/books/{{ $book->id_product }}">{{ $book->owner->name }}</a></h2>
</header>
<ul>  <!-- important info -->
    <li>{{ $book->owner->price }}</li>
    <li>{{ $book->edition }}</li>
    <li>{{ $book->owner->rating }}</li>
    <li> @foreach($book->authors as $category)
                <td>{{$category->id_author}}</td>
                <td>{{$category->name}}</td>
            @endforeach</li>
    <li>{{ $book->publisher->name }}</li>
    <li>{{ $book->owner->year }}</li>
</ul>
</article>

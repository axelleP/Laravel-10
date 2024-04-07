@extends('layouts.app')

@section('title', __('article.form'))

@section('content')
    @if(session('error'))
        <div class="text-danger">
            {{ session('error') }}
        </div>
        <br/>
    @endif

    @if ($errors->any() && config('app.env') == 'local')
        <div class="text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('article.form', ['id' => $article->id ?? null]) }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <label for="name">@lang('article.name')</label>
        <input type="text" required name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $article->name ?? '') }}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>
        
        <label for="description">@lang('article.description')</label>
        <textarea required name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description', $article->description ?? '') }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>

        <label for="price">@lang('article.price')</label>
        <input type="number" required step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $article->price ?? '') }}">
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>

        <label for="image">@lang('article.image')</label>
        @if(!empty($article->image))
            <img id='image' src="{{ asset('storage/articles/' . $article->image) }}">
        @endif
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>

        @if(!empty($article->id))
            <button type="submit">@lang('actions.edit')</button>
        @else
            <button type="submit">@lang('actions.add')</button>
        @endif
        <button><a href="{{ url('articles') }}">@lang('actions.cancel')</a></button>
    </form>
@endsection
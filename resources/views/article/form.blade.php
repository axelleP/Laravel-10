@extends('layouts.app')

@section('title', __('article.form'))

@section('content')
    @if ($errors->any() && config('app.env') == 'local')
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('article.form') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <label for="name">@lang('article.name')</label>
        <input type="text" required name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>
        
        <label for="description">@lang('article.description')</label>
        <textarea required name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>

        <label for="price">@lang('article.price')</label>
        <input type="number" required step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>

        <label for="image">@lang('article.image')</label>
        <input type="file" required name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br/><br/>

        <button name="btnAddArticle" type="submit">@lang('actions.add')</button>
    </form>
@endsection
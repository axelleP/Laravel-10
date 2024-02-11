@extends('layouts.app')

@section('title', __('article.form'))

@section('content')
    <form action="{{ route('article.form') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">@lang('article.name')</label>
        <input type="text" name="name" id="name">
        <br/><br/>
        
        <label for="description">@lang('article.description')</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br/><br/>

        <label for="image">@lang('article.image')</label>
        <input type="file" name="image" id="image">
        <br/><br/>

        <button name="btnAddArticle" type="submit">Ajouter</button>
    </form>
@endsection
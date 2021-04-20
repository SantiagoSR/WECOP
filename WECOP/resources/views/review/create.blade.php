@extends('layouts.app')

@section('title', $data['pageTitle'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <h2 class="text-center text-uppercase text-secondary"> @lang('review.create_review') {{ $data['ecoProduct']->getName() }}</h2>
            @if($errors->any())
            <ul id="errors">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <form method="POST" action="{{ route('review.save', ['id' =>  $data['ecoProduct']->getId()]) }}">
                @csrf
                <div class="form-group row">
                    <label for="rating" class="col-md-4 col-form-label text-md-right">@lang('review.rating_input')</label>
                    <div class="col-md-6">
                        <input type="text" name="rating" value="{{ old('rating') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">@lang('review.title_input')</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="@lang('review.title_input')" name="title" value="{{ old('title') }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-md-4 col-form-label text-md-right">@lang('review.message_input')</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="@lang('review.message_input')" name="message" value="{{ old('message') }}" />
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            @lang('review.send')
                        </button>
                    </div>
                </div>
            </form>
            <div class="form-group row mb-0">
                <div class="col-md-3 offset-md-4">
                    <form action="{{ route('ecoProduct.show', ['id' =>  $data['ecoProduct']->getId(), 'filter' => 'All'])}}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('order.back')</button>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
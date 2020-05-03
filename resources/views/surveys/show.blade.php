@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $questionnaire->title }}</h1>

            <form action="{{ route('surveys.store', ['questionnaire' => $questionnaire->id, 'slug' => Str::slug($questionnaire->title)]) }}" method="post">
                @csrf

                @foreach ($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }}. </strong>{{ $question->question }}</div>
                        <div class="card-body">
                            @error('responses.' .$key. '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <ul class="list-group">
                                @foreach ($question->answers as $answer)
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <input class="mr-2" type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" value="{{ $answer->id }}" {{ (old('responses.' .$key. '.answer_id') == $answer->id) ? 'checked' : '' }}>
                                            {{ $answer->answer }}
                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <div class="card mt-4">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">        
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Hello! What's your name?</small>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="survey[email]">Your Email</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">Your email please!</small>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                </div>
                <button class="btn btn-dark mt-2" type="submit">Complete Survey</button>
            </form>
        </div>
    </div>
</div>
@endsection

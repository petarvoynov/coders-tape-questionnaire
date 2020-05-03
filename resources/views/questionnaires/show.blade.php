@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    <a class="btn btn-dark" href="{{ route('questions.create', ['questionnaire' => $questionnaire->id]) }}">Add New Question</a>
                    <a class="btn btn-dark" href="{{ route('surveys.show', ['questionnaire' => $questionnaire->id, 'slug' => Str::slug($questionnaire->title)]) }}">Take Survey</a>
                </div>
            </div>

            @foreach ($questionnaire->questions as $question)
                <div class="card mt-4">
                    <div class="card-header">{{ $question->question }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                        @foreach ($question->answers as $answer)  
                            <li class="list-group-item">{{ $answer->answer }}</li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('questions.destroy', ['questionnaire' => $questionnaire->id, 'question' => $question->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete Question</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

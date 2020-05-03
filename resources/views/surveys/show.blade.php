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
                            <ul class="list-group">
                                @foreach ($question->answers as $answer)
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <input class="mr-2" type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" value="{{ $answer->id }}">
                                            {{ $answer->answer }}
                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <button class="btn btn-dark mt-2" type="submit">Complete Survey</button>
            </form>

            {{-- <div class="card">
                <div class="card-header">Create New Questionnaire</div>

                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                            <small id="titleHelp" class="form-text text-muted">Give your questionnaire a title that attracts attention.</small>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input name="purpose" type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter Purpose">
                            <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase responses.</small>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Questionnaire</button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

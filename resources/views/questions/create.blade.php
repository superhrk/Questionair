@extends('layouts.app')

@section('style')
    <style>
        ul {
            list-style-type:none;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="text-primary">Add Questions
                        <small class="text-danger">in {!! $questionair->name !!}</small> -
                        <small>Total Q#: [ {{ count($questionair->Questions) > 0 ? count($questionair->Questions) : 0 }} ]
                            Duration: [ {!! $questionair->duration !!} ]
                        </small>
                    </h2>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('questionair.questions.store', $questionair->id) }}">
                        {{ csrf_field() }}

                        {{--Add Question Type Dropdown--}}
                        <div id="AddQtypeHere">

                            {{--Previous Questions of the current questionairs--}}
                            @if(count($questionair->Questions) > 0)
                                @include('questions.partials.previous-ques')
                            @endif

                        </div>

                        {{--Add Question Type Button--}}
                        <button id="AddQType" type="button" class="btn btn-success pull-left">
                            Add Question
                        </button>

                        {{--Save Form Data--}}
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Save Questions
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @include('questions.partials._script')
@endsection

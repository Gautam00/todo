@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-body">
			    <form method="post" action="{{route('updateTask', $task->id)}}" >
			        @method('PATCH')
                	@csrf

			        <div class="form-group row">
			            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

			            <div class="col-md-6">
			                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $task->name }}" required autocomplete="name" autofocus>

			                @error('name')
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $message }}</strong>
			                    </span>
			                @enderror
			            </div>
			        </div>


			        <div class="form-group row mb-0">
			            <div class="col-md-6 offset-md-4">
			                <button type="submit" class="btn btn-primary">
			                    {{ __('Update') }}
			                </button>
			            </div>
			        </div>
			    </form>
			</div>

        </div>
    </div>
</div>
@endsection

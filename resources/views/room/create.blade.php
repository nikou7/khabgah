@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Dormitories.room.store',['dormitory'=>$dormitory->id]) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="Number" class="col-md-4 col-form-label text-md-end">{{ __('Number') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Number" required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="capacity" class="col-md-4 col-form-label text-md-end">{{ __('capacity') }}</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="capacity" required >
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Insert') }}
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

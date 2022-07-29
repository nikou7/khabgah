@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Dormitories.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="roomNumber" class="col-md-4 col-form-label text-md-end">{{ __('roomNumber') }}</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="roomNumber" required >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('address') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" required >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('telephone') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telephone" required >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="description" required >
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

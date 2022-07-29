@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l" style="text-align: center;font-size:xx-large;height: 50px">
                                <a href="{{route('showUsers')}}">Users</a>
                            </div>
                        </div>
                        <hr>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l" style="text-align: center;font-size:xx-large;height: 50px">
                                <a href="{{route('admin.Dormitories')}}">Dormitories</a>
                            </div>
                        </div>
                        <hr>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l" style="text-align: center;font-size:xx-large;height: 50px">
                                <a href="{{route('All_request')}}">Requests</a>
                            </div>
                        </div>
                        <hr>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l" style="text-align: center;font-size:xx-large;height: 50px">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

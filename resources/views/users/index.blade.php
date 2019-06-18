@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form action="{{ route('users.search') }}" method="POST" class="card card-sm">
                            @method('get')
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords" name='search'>
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                    @isset($request->search)
                    <div class="card-title"><h5>{{ $search_result }}</h5></div>
                    @endisset
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($users as $user)
                        <div class="card">
                            <h5 class="card-header">{{ $user->name }}</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->user_topic }}</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href=" {{ route('users.show', $user->id) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $users->appends(request()->input())->links() }}

            </div>
        </div>
    </div>
</div>
@endsection

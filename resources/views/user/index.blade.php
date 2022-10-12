@extends('layouts.base')

@section('content')
    <form id="base-form-search" method="GET" action="{{ route('users.index') }}">
        <div class="form-search">
            <div class="card-header" id="header-search">
                <h5 class="mb-0 d-flex justify-content-between">
                    <div class="d-flex font-weight-bold align-items-center">
                        Form Search
                    </div>
                    <button type="button" class="btn btn-toggle text-left " data-bs-toggle="collapse"
                            data-bs-target="#collapse-body" aria-expanded="true">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </h5>
            </div>

            <div id="collapse-body" class="collapse show">
                <div class="card-body row m0">
                    <div class="col-6">
                        <div class="input-field d-flex">
                            <label class="col-3" for="">Name</label>
                            <input type="text" class="form-control name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-field d-flex">
                            <label class="col-3" for="">Email</label>
                            <input type="text" class="form-control email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="card-footer text-center m20t">
                        <x-button id="btn-submit-base-form-search">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            Search
                        </x-button>
                        <x-button id="abc">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            Clear
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="data-content">
        <div class="table-content m16b">
            <table class="table table table-striped">
                <thead>
                <tr>
                    <th class="w-10 text-center" scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($listData as $key => $value)
                    <tr>
                        <th class="text-center" scope="row">{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ __('enum.users.role')[$value->role] }}</td>
                        <td class="text-center">
                            <div class="icon-handle">
                                <button class="btn btn-color">
                                    <i class="fa fa-pencil-square-o color-white" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">{{ __('ui.common.no_data') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

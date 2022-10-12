@extends('layouts.base')

@section('breadcrumb')
    {{ __('ui.side_bar.user.index') }}
@endsection

@section('content')
    <form method="GET" action="{{ route('users.index') }}">
        <div class="form-search">
            <div class="card-header" id="header-search">
                <h5 class="mb-0 d-flex justify-content-between">
                    <div class="d-flex font-weight-bold align-items-center">
                        {{ __('ui.common.title_form_search') }}
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
                            <label class="col-3" for="">{{ __('attribute.users.name') }}</label>
                            <input type="text" class="form-control name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-field d-flex">
                            <label class="col-3" for="">{{ __('attribute.users.email') }}</label>
                            <input type="text" class="form-control email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="card-footer text-center p20t">
                        <button type="submit" class="btn btn-primary btn-common m10r">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            {{ __('ui.common.btn.search') }}
                        </button>
                        <button type="button" class="btn btn-primary btn-common btn_clear">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            {{ __('ui.common.btn.clear') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="data-content">
        <div class="d-flex justify-content-end">
            <div>
                <a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-primary btn-common m10r mb-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        {{ __('ui.common.btn.create') }}
                    </button>
                </a>
            </div>
        </div>
        <div class="table-content m16b">
            <table class="table table table-striped">
                <thead>
                <tr>
                    <th class="w-10 text-center" scope="col">{{ __('ui.common.column.no') }}</th>
                    <th scope="col">{{ __('attribute.users.name') }}</th>
                    <th scope="col">{{ __('attribute.users.email') }}</th>
                    <th scope="col">{{ __('attribute.partners.is_active') }}</th>
                    <th scope="col">{{ __('attribute.users.role') }}</th>
                    <th scope="col" class="text-center">{{ __('ui.common.column.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <th class="text-center"
                            scope="row">{{ (($users->currentPage() - 1)*$users->perPage()) + $index + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ __('enum.users.is_active')[$user->is_active] }}</td>
                        <td>{{ __('enum.users.role')[$user->role] }}</td>
                        <td class="text-center">
                            <div class="icon-handle">
                                <a href="{{ route('users.show', $user->id) }}">
                                    <button class="btn btn-color">
                                        <i class="fa fa-pencil-square-o color-white" aria-hidden="true"></i>
                                    </button>
                                </a>
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
    <div class="d-flex">
        {{ $users->appends(['name' => old('name'), 'email' => old('email')])->links() }}
    </div>
@endsection

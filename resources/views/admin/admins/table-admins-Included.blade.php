<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                          transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"/>
                                  </svg>
                                </span>
                <input type="text" data-kt-user-table-filter="search"
                       class="form-control form-control-solid w-250px ps-14"
                       placeholder=""/>
            </div>
        </div>
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

            @if(isCleanArray($actions))
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0  fw-semibold ">
                    <li class="nav-item ms-auto">
                        <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                           data-kt-menu-attach="parent"
                           data-kt-menu-placement="bottom-end">
                            {{ ucwords(trans('app.actions')) }}
                            <span class="svg-icon svg-icon-2 me-0"></span>
                        </a>
                        <div
                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6"
                            data-kt-menu="true">
                            <div class="menu-item px-5">
                                <div
                                    class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">      {{ ucwords(trans('app.actions')) }} </div>
                            </div>
                            @foreach($actions as $action)
                                <x-table.action id="" :action="$action"/>
                            @endforeach
                        </div>
                    </li>
                </ul>
            @endif

        </div>
    </div>
    <div class="card-body py-4">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-4"
                   id="test-dt">
                <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="no-sort  w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input id="dt-check-all-checks" class="form-check-input" type="checkbox"/>
                        </div>

                    </th>

                    <th>{{ trans('pages/admin/admins.photo') }}</th>
                    <th>{{ trans('pages/admin/admins.first_name') }}</th>
                    <th>{{ trans('pages/admin/admins.last_name') }}</th>
                    <th>{{ trans('pages/admin/admins.birthday') }}</th>
                    <th>{{ trans('elements.gender') }}</th>
                    <th>{{ trans('elements.phone') }}</th>
                    <th>{{ trans('elements.email') }}</th>
                    <th>{{ trans('elements.description') }}</th>
                    <th>{{ trans('pages/admin/admins.role') }}</th>
                    <th>{{ trans('pages/admin/admins.status') }}</th>
                    <th>{{ trans('pages/admin/admins.created_by') }}</th>
                    <th>{{ trans('pages/admin/admins.created_at') }}</th>


                    <th class="no-sort ">
                        {{ ucwords(trans('app.actions')) }}
                    </th>

                </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">


                @if(isCleanArray($admins))
                    @foreach($admins as $model)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input dt-check"
                                           type="checkbox" value="{{ $model[config('tables.admins.columns.id')]}}"/>
                                </div>
                            </td>
                            <td>
                                <x-media.image
                                    src="{{ private_file( $model[config('tables.admins.columns.photo')]) }}"
                                />
                            </td>
                            <td>{{ $model[config('tables.admins.columns.first_name')] }}</td>
                            <td>{{ $model[config('tables.admins.columns.last_name')] }}</td>
                            <td>{{ $model[config('tables.admins.columns.birthday')] }}</td>
                            <td>
                                <div class="text-nowrap">

                                    {{ $model[config('tables.admins.columns.gender')]->text() }}
                                    @if($model[config('tables.admins.columns.gender')] == \App\Enums\AdminGender::MAN)
                                        <i class="fa-solid fa-person text-primary pulse"></i>
                                    @else
                                        <i class="fa-solid fa-person-dress text-success pulse"></i>
                                    @endif


                                </div>

                            </td>
                            <td>{{ $model[config('tables.admins.columns.phone_number')] }}</td>
                            <td>{{ $model[config('tables.admins.columns.email')] }}</td>
                            <td>
                                <x-helpers.show-more :text="$model[config('tables.admins.columns.description')]" />
                            </td>
                            <td>
                                     <span
                                         class="badge badge-{{ $model->role->class() }}">{{ $model->role->text() }}</span>
                            </td>
                            <td>
                                 <span
                                     class="badge badge-{{ $model->status->class() }}">{{ $model->status->text() }}</span>
                            </td>
                            <td>{{ $model[config('tables.admins.columns.created_by')] }}</td>
                            <td>{{ $model[config('tables.admins.columns.created_at')]->diffForHumans() }}</td>

                            <td class="text-end">
                                <div>
                                    <button type="button" class="btn btn-primary rotate"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                                            data-kt-menu-offset="30px, 30px">
                                        <i class="fa-solid fa-sliders"></i>
                                    </button>
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.admins.show' , $model[config('tables.admins.columns.id')]) }}"
                                               class="menu-link px-3">
                                                {{ trans('app.edit') }}
                                            </a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.admins.delete' , $model[config('tables.admins.columns.id')]) }}"
                                               class="menu-link px-3 text-danger delete-record">
                                                {{ trans('app.delete') }}
                                            </a>
                                        </div>
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                             data-kt-menu-placement="right-start">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">Status</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">

                                                @foreach(\App\Enums\AdminStatus::toArray() as $key => $value)
                                                    @php $currentStatus =  $key == $model[config('tables.admins.columns.status')]->value; @endphp
                                                    <div class="menu-item px-3">
                                                        <a href="{{ $currentStatus ? '#' :   route('admin.admins.update_status' , [$model[config('tables.admins.columns.id')], 'status' => $key]) }}"
                                                           data-status="{{$key}}"
                                                           class="menu-link px-3 @if($currentStatus) bg-primary text-white @endif">
                                                            {{ $value }}
                                                        </a>
                                                    </div>
                                                @endforeach


                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @endif


                </tbody>
            </table>
        </div>
    </div>
</div>

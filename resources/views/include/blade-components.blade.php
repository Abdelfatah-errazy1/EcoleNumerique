
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/blade-component.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/blade-components.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endpush

@push('modals')
    <div class="modal fade" tabindex="-1" id="component_show-more">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ trans('components.SMT_modal_header_title') }}</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <p>
                        lorem*50
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ trans('app.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endpush

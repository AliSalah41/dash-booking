<!--begin::Input group-->
<div class="fv-row col-12">
    <!--begin::Label-->
    <label class="required fs-6 mb-2 text-capitalize">{{$label}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <select class="form-select form-select-solid mb-3 mb-lg-0 single-select"  name="{{$name}}" aria-label="" required>
        @if(isset($old) && $old)
            @foreach($options as $key=>$option)
                <option value="{{$key}}" {{$old==$key?'selected':''}} >{{$option}}</option>
            @endforeach
        @else
{{--            <option value="" ></option>--}}
        @foreach($options as $key=>$option)
                <option value="{{$key}}" >{{$option}}</option>
            @endforeach
        @endif
    </select>
    <!--end::Input-->
</div>
<!--end::Input group-->
@push('scripts')
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
    @endpush

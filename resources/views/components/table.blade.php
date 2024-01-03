<style>
    #table_filter{
        float: right;
    }
    #table_paginate{
        float: right;
    }
    tr {
        height: 45px;
    }
    table{
        margin-top: 1rem!important;
        margin-bottom: 2rem!important;
    }
    .table_length{

    }
</style>
<div>
    <div class="container  mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-2">
                <span class="text-capitalize">{{$title}}</span>
                @if(isset($createRoute))
                    <button type="button"  id="create" class="has_action btn btn-primary px-5" data-type="edit"
                            data-action="{{$createRoute}}">
                        <i class="fa-solid fa-plus"></i>
                        Create new
                    </button>
                @endif

            </div>
            <div class="card-body" style="overflow: scroll">
                {{$slot}}
            </div>
        </div>
    </div>
</div>

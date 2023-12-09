@extends('admin.layouts.app')
@section('home', '/User')
@section('title')
    Categories
@stop
@section('subtitle')
  Add category
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Category Information</h5>
                    </div>
                    <hr>
{{--    --}}
<form class="row g-3" action='{{route('category.store')}}' method="POST">
    @csrf

    <div class="col-md-12">
        <label for="inputLastName1" class="form-label">Category Title</label>
        <div class="input-group">
            <input type="text" name="title" class="form-control border-start-1" id="inputLastName1"
                   placeholder="title"/>
        </div>
        @error('title')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="inputLastName1" class="form-label">Category Description</label>
        <div class="input-group">
            <input type="text" name="description" class="form-control border-start-1" id="inputLastName1"
                   placeholder="description"/>
        </div>
        @error('description')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
{{--  <div class="card-body">
    <ul class="nav nav-tabs nav-primary" role="tablist">
        <li class="nav-item " role="presentation">
            <a class="nav-link  active" data-bs-toggle="tab" href="#en" role="tab" aria-selected="false">
                <div class="d-flex align-items-center">
                    <div class="tab-title">English</div>
                </div>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link " data-bs-toggle="tab" href="#ar" role="tab" aria-selected="true">
                <div class="d-flex align-items-center">
                    <div class="tab-title">Arabic</div>
                </div>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#fr" role="tab" aria-selected="false">
                <div class="d-flex align-items-center">
                    <div class="tab-title">French</div>
                </div>
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#de" role="tab" aria-selected="false">
                <div class="d-flex align-items-center">
                    <div class="tab-title">German</div>
                </div>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#es" role="tab" aria-selected="false">
                <div class="d-flex align-items-center">
                    <div class="tab-title">Spanish</div>
                </div>
            </a>
        </li>
    </ul>
    <div class="tab-content py-3">
        <div class="tab-pane fade active show" id="en" role="tabpanel">
            <div class="col-md-12">
                <label for="inputLastName1" class="form-label">Title</label>
                <div class="input-group">
                    <input type="text" name="en[title]" class="form-control border-start-0" id="inputLastName1"
                           placeholder="title"/>
                </div>
                @error('en.title')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label mt-4">Description</label>
                <div class="input-group">
                <input type="text" class="form-control border-start-0" id="birthdate" name="en[description]"
                placeholder="description"
                />
                </div>
            </div>
            @error('en.description')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="tab-pane fade" id="ar" role="tabpanel">
            <div class="col-12">
                <label for="inputLastName1" class="form-label ">Title</label>
                <div class="input-group">
                    <input type="text" name="ar[title]" class="form-control border-start-0" id="inputLastName1"
                           placeholder="title"/>
                </div>
                @error('ar.title')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <label for="birthdate" class="form-label mt-4">Description</label>
                <input type="text" class="form-control border-start-0" id="birthdate" name="ar[description]"
                placeholder="description"
                />
            </div>
            @error('ar.description')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="tab-pane fade" id="fr" role="tabpanel">
            <div class="col-md-12">
                <label for="inputLastName1" class="form-label">Title</label>
                <div class="input-group">
                    <input type="text" name="fr[title]" class="form-control border-start-0" id="inputLastName1"
                           placeholder="title"/>
                </div>
                @error('fr.title')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <label for="birthdate"  class="form-label mt-4">Description</label>
                <input type="text" class="form-control border-start-0" id="birthdate" name="fr[description]"
                placeholder="description"
                />
            </div>
            @error('fr.description')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="tab-pane fade" id="de" role="tabpanel">
            <div class="col-md-12">
                <label for="inputLastName1" class="form-label">Title</label>
                <div class="input-group">
                    <input type="text" name="de[title]" class="form-control border-start-0" id="inputLastName1"
                           placeholder="title"/>
                </div>
                @error('de.title')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <label for="birthdate"  class="form-label mt-4">Description</label>
                <input type="text" class="form-control border-start-0" id="birthdate" name="de[description]"
                placeholder="description"
                />
            </div>
            @error('de.description')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="tab-pane fade" id="es" role="tabpanel">
            <div class="col-md-12">
                <label for="inputLastName1" class="form-label">Title</label>
                <div class="input-group">
                    <input type="text" name="es[title]" class="form-control border-start-0" id="inputLastName1"
                           placeholder="title"/>
                </div>
                @error('es.title')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12">
                <label for="birthdate"  class="form-label mt-4">Description</label>
                <input type="text" class="form-control border-start-0" id="birthdate" name="es[description]"
                placeholder="description"
                />
            </div>
            @error('es.description.')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>  --}}

<div class="col-12 d-flex">
    <button type="submit"
            class="btn btn-primary px-5 ms-auto">Add category</button>
</div>
</form>
{{--    --}}





                        </div>
                    </div>


    </div>
    {{-- @yield('imagePreview') --}}
@endsection

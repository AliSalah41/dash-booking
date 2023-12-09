@extends('admin.layouts.app')
@section('home', '/admin')
@section('title')
    events
@stop
@section('subtitle')
    create event
@stop

@section('content')
    {{-- / / /////////////////////////////////////////////// --}}

    {{-- ////////////////////////////////////// --}}
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="fa-regular fa-calendar-check" style="color: #008cff;"></i>
                        </div>
                        <h5 class="mb-0 text-primary">create event</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('store') }}' method="POST" enctype="multipart/form-data">
                        @csrf
                        {{--  <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item " role="presentation">
                                    <a class="nav-link  active" data-bs-toggle="tab" id="en-tab" data-lang="en"
                                        href="#en" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">English</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link " data-bs-toggle="tab" id="ar-tab" aria-controls="ar"
                                        data-lang="ar" href="#ar" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Arabic</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" data-lang="fr" href="#fr" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">French</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" data-lang="de" href="#de" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">German</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" data-lang="es" href="#es" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Spanish</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>  --}}
                            {{--  <div class="tab-content py-3">
                                <div class="tab-pane fade active show" id="en" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">English Title </label>
                                        <div class="input-group">
                                            <input required type="text" name="en[name]"
                                                class="form-control border-start-0" id="inputLastName1"
                                                placeholder="title" />
                                        </div>
                                        @error('en.name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label mt-4"> English Description</label>
                                        <div class="input-group">
                                            <input required type="text" class="form-control border-start-0"
                                                id="birthdate" name="en[description]" placeholder="description" />
                                        </div>
                                        @error('en.description')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="ar" role="tabpanel">
                                    <div class="col-12">
                                        <label for="inputLastName1" class="form-label ">Arabic Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="ar[name]"
                                                class="form-control border-start-0" id="inputLastName1"
                                                placeholder="Title" />
                                        </div>
                                        @error('ar.name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="birthdate" class="form-label mt-4">Arabic Description</label>
                                        <input required type="text" class="form-control border-start-0" id="birthdate"
                                            name="ar[description]" placeholder="description" />
                                    </div>
                                    @error('ar.description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="tab-pane fade" id="fr" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">French Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="fr[name]"
                                                class="form-control border-start-0" id="inputLastName1"
                                                placeholder="title" />
                                        </div>
                                        @error('fr.name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="birthdate" class="form-label mt-4">French Description</label>
                                        <input required type="text" class="form-control border-start-0" id="birthdate"
                                            name="fr[description]" placeholder="description" />
                                    </div>
                                    @error('fr.description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="tab-pane fade" id="de" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">German Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="de[name]"
                                                class="form-control border-start-0" id="inputLastName1"
                                                placeholder="title" />
                                        </div>
                                        @error('de.name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="birthdate" class="form-label mt-4">German Description</label>
                                        <input required type="text" class="form-control border-start-0" id="birthdate"
                                            name="de[description]" placeholder="description" />
                                    </div>
                                    @error('de.description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="tab-pane fade" id="es" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">Spanish Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="es[name]"
                                                class="form-control border-start-0" id="inputLastName1"
                                                placeholder="title" />
                                        </div>
                                        @error('es.name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="birthdate" class="form-label mt-4">Spanish Description</label>
                                        <input required type="text" class="form-control border-start-1" id="birthdate"
                                            name="es[description]" placeholder="description" />
                                    </div>
                                    @error('es.description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>  --}}
                        <div class="col-12">
                            <label for="limit">Event Title</label>
                            <input  type="text" name='name' class="form-control border-start-1"
                                id="birthdate" placeholder="title" />
                        </div>
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="col-12">
                            <label for="limit">Event Description</label>
                            <input  type="text" name='description' class="form-control border-start-1"
                                id="birthdate" placeholder="description" />
                        </div>
                        @error('description')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        {{--  <div class="col-12">
                            <label for="limit">tickets limit</label>
                            <input  type="number" name='tickets_limit' class="form-control border-start-1"
                                id="birthdate"
                                placeholder="Tickets limit"
                                />
                        </div>
                        @error('tickets_limit')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror  --}}

                        <div class="col-12">
                            <label for="limit">Address</label>
                            <input  type="text" name='address' class="form-control border-start-1"
                                id="birthdate" placeholder="address" />
                        </div>
                        @error('address')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        {{--  <div class="col-12">
                            <label for="limit">Price</label>
                            <input  type="text" name='price' class="form-control border-start-1"
                                id="birthdate" placeholder="price" />
                        </div>
                        @error('price')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror  --}}

                        {{--
                        @foreach (App\Models\Price::$currencies as $currency)
                            <div class="row p-3">
                                <div class="col-md-6">

                                    <input required type="text" name="price[{{ $currency }}]" placeholder="price"
                                        class="form-control" id="price" />
                                </div>
                                <div class="col-md-6">

                                    <label>{{ $currency }}</label>

                                </div>
                            </div>

                            @error('price.' . $currency)
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        @endforeach  --}}



                        <div class="col-12">
                            <label>Event Image</label>
                            <input  type="file" name='image' placeholder="choose image"
                                class="form-control border-start-1" id="birthdate" />
                        </div>
                        @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="card-body">

                            <div class="row gy-3">

                                <div class="col-md-3 text-end d-grid">
                                    <button type="button" name="datetime" id="myButton" onclick="CreateTicketTodo();"
                                        class="btn btn-primary">Ticket details</button>
                                </div>

                            </div>
                            <div class="form-row mt-3">
                                <div class="col-12">
                                    <div id="ticket-todo-container"></div>
                                </div>
                            </div>

                        </div>



                        <div class="card-body">

                            <div class="row gy-3">

                                <div class="col-md-3 text-end d-grid">
                                    <button type="button" name="datetime" id="myButton" onclick="CreateTodo();"
                                        class="btn btn-primary">Duration details</button>
                                </div>


                            </div>
                            <div class="form-row mt-3">
                                <div class="col-12">
                                    <div id="todo-container"></div>

                                </div>
                            </div>


                        </div>
                        {{--  <div >
                        <label for="time">select Time:</label>
                        <input required class="col-12  form-control border-start-0" type="time" id="time" name="time" placeholder="HH:MM:SS">
                        </div>
                        @error('time')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror  --}}


                        <div>
                            <label for="inputPhone" class="form-label">select category</label>
                            <select class="col-12  form-control border-start-0" name="category">

                                @foreach ($categories as $category)
                                    <option name="category" value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach

                            </select>
                            @error('category')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div>
                            <label for="inputPhone" class="form-label">select country</label>


                            <select class="col-12  form-control border-start-0" id="country" name="country">

                                @foreach ($countries as $country)
                                    <option name='country' value="{{ $country->id }}">{{ $country->country }}</option>
                                @endforeach



                            </select>
                            @error('phone')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <div>
                            <label for="inputPhone" class="form-label">select city</label>


                            <select class="col-12  form-control border-start-0" id="city" name="city">

                                @foreach ($cities as $city)
                                    <option name='city' value="{{ $city->country->id }}">{{ $city->city }}</option>
                                @endforeach

                            </select>
                            @error('city')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 d-flex">

                            <button type="submit" class="btn btn-primary px-5 ms-auto">create event</button>


                               </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- @yield('imagePreview') --}}

@endsection
@section('scripts')

    <script type="text/javascript">
        function city() {
            var countryId = $('#country').val();

            if (countryId) {
                $.ajax({
                    url: "{{ route('cities', ':country_id') }}".replace(':country_id', countryId),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#city').empty();

                        if (data.length > 0) {
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value.city +
                                    '</option>');
                            });
                        } else {
                            $('#city').append('<option value="">No cities found</option>');
                        }
                    }
                });
            } else {
                $('#city').empty();
                $('#city').append('<option value="">Select City</option>');
            }

        }


        $(document).ready(function() {


            city.call();
            $('#country').change(function() {
                city.call();
            });

        });
    </script>
    <script>
        // to do list
        var todos = [{
            text: "take out the trash",
            done: false,
            id: 0
        }];
        var currentTodo = {
            text: "",
            done: false,
            id: 0
        }
        {{--  document.getElementById("todo-input").oninput = function (e) {
			currentTodo.text = e.target.value;
		};  --}}
        /*
        	//jQuery Version
        	$('#todo-input').on('input',function(e){
        		currentTodo.text = e.target.value;
        	   });
        	*/

        let index = 1;
        let i = 0;

        function DrawTodo(todo) {
            var newTodoHTML = `
			<div class="pb-3 todo-item" todo-id="${todo.id}">
				<div class="input-group">

                    <div class="form-group col-5 ">
                        <label class="col-form-label">Duration Title</label>
                        <input  type="text" name='title[]' class="  form-control ${todo.done&&" todo-done "} " aria-label="Text input with checkbox"
                        placeholder='Duration Title'
                        >

                        @error('title.*')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="form-group col-5 ">
                        <label class="col-form-label">Duration Description</label>
                        <input  type="text" name='desc_time[]' class="  form-control ${todo.done&&" todo-done "} " aria-label="Text input with checkbox"
                         placeholder='Duration Description'
                        >

                        @error('desc_time.*')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>


                        <div class="form-group col-5 ">
                          <label class="col-form-label">Start</label>
                          <input  type="datetime-local" name="start[]" class="form-control ${todo.done&&" todo-done "} " aria-label="Text input with checkbox" >

                          @error('start.*')
                          <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>



                        <div class="form-group col-5 ">
                          <label class="col-form-label">End</label>
                          <input type="datetime-local" name='end[]' class="  form-control ${todo.done&&" todo-done "} " aria-label="Text input with checkbox" >

                          @error('end.*')
                          <small class="form-text text-danger">{{ $message }}</small>
                          @enderror
                        </div>



                          <div class="form-group col-10 ">
                            <label class="col-form-label">Duration Image</label>
                            <input  type="file" name='img[]' class=" btn-file form-control ${todo.done&&" todo-done "} " aria-label="Text input with checkbox" placeholder='description' >

                            @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button todo-id="${todo.id}" class=" btn btn-outline-secondary bg-primary text-white" type="button" onclick="DeleteTodo(this);" id="button-addon2 " style="margin: auto; margin-bottom: 0;">X</button>

                          {{-- ////////////////////////////////// --}}

                          {{-- ////////////////////////////////// --}}
                          {{--  <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" data-lang="en" href="#en${index}" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">English</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" data-lang="ar" href="#ar${index}" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Arabic</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" data-lang="fr" href="#fr${index}" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">French</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" data-lang="de" href="#de${index}" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">German</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" data-lang="es" href="#es${index}" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Spanish</div>
                                        </div>
                                    </a>
                                </li>
                                <!-- Add similar code for other languages -->
                            </ul>

                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="en${index}" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">English Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="en[${i}][title]" class="form-control ${todo.done&&" todo-done "} border-start-0" id="inputLastName1"
                                            placeholder="title (english)"/>



                                        </div>
                                        @error('en.title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label mt-4">English Description</label>
                                        <div class="input-group">
                                        <input required type="text" class="form-control  ${todo.done&&" todo-done "} border-start-0" id="birthdate" name="en[${i}][desc_time]"
                                        placeholder="description (english)"
                                        />



                                    </div>
                                    @error('en.desc_time')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="ar${index}" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">Arabic Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="ar[${i}][title]" class="form-control ${todo.done&&" todo-done "} border-start-0" id="inputLastName1"
                                                   placeholder="title (arabic)"/>
                                        </div>
                                        @error('ar.title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label mt-4">Arabic Description</label>
                                        <div class="input-group">
                                        <input required type="text" class="form-control ${todo.done &&" todo-done "} border-start-0" id="birthdate" name="ar[${i}][desc_time]"
                                        placeholder="description (arabic)"
                                        />
                                        </div>
                                    </div>
                                    @error('ar.desc_time')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="tab-pane fade" id="fr${index}" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">French Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="fr[${i}][title]" class="form-control ${todo.done&&" todo-done "} border-start-0" id="inputLastName1"
                                                   placeholder="title (french)"/>
                                        </div>
                                        @error('fr.title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label mt-4">French Description</label>
                                        <div class="input-group">
                                        <input required type="text" class="form-control ${todo.done &&" todo-done "} border-start-0" id="birthdate" name="fr[${i}][desc_time]"
                                        placeholder="description (french)"
                                        />
                                        </div>
                                    </div>
                                    @error('fr.desc_time')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="tab-pane fade" id="de${index}" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">German Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="de[${i}][title]" class="form-control ${todo.done&&" todo-done "} border-start-0" id="inputLastName1"
                                                   placeholder="title (german)"/>
                                        </div>
                                        @error('de.title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label mt-4">German Description</label>
                                        <div class="input-group">
                                        <input required type="text" class="form-control ${todo.done &&" todo-done "} border-start-0" id="birthdate" name="de[${i}][desc_time]"
                                        placeholder="description (german)"
                                        />
                                        </div>
                                    </div>
                                    @error('de.desc_time')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="tab-pane fade" id="es${index}" role="tabpanel">
                                    <div class="col-md-12">
                                        <label for="inputLastName1" class="form-label">Spanish Title</label>
                                        <div class="input-group">
                                            <input required type="text" name="es[${i}][title]" class="form-control ${todo.done&&" todo-done "} border-start-0" id="inputLastName1"
                                                   placeholder="title (spanish)"/>
                                        </div>
                                        @error('es.title')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label mt-4">Spanish Description</label>
                                        <div class="input-group">
                                        <input required type="text" class="form-control ${todo.done &&" todo-done "} border-start-0" id="birthdate" name="es[${i}][desc_time]"
                                        placeholder="description (spanish)"
                                        />
                                        </div>
                                    </div>
                                    @error('es.desc_time')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Add similar code for other languages -->
                            </div>
                        </div>  --}}

                            {{--  /////////////////////////////  --}}





                        </div>
				</div>

			  `;
            /*
        			var dummy = document.createElement("DIV");
        			dummy.innerHTML = newTodoHTML;
        			document.getElementById("todo-container").appendChild(dummy.children[0]);
                    */
            //jQuery version
            var newTodo = $.parseHTML(newTodoHTML);
            $("#todo-container").append(newTodo);
            index++;
            i++;

        }

        function RenderAllTodos() {
            var container = document.getElementById("todo-container");
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }
            /*
            	//jQuery version
            	  $("todo-container").empty();
            	*/
            for (var i = 0; i < todos.length; i++) {
                DrawTodo(todos[i]);
            }
        }
        RenderAllTodos();


        function DeleteTodo(button) {
            var deleteID = parseInt(button.getAttribute("todo-id"));

            for (let i = 0; i < todos.length; i++) {
                if (todos[i].id === deleteID) {
                    // Remove the todo from the DOM
                    var todoElement = document.querySelector(`.todo-item[todo-id="${deleteID}"]`);
                    todoElement.parentNode.removeChild(todoElement);

                    // Remove the todo from the todos array
                    todos.splice(i, 1);

                    // Update the indices of the remaining todos
                    updateTodoIndices();
                    break;
                }
            }
        }

        function updateTodoIndices() {
            // Update the indices of the todos based on their current order
            for (let i = 0; i < todos.length; i++) {
                todos[i].id = i;
            }
        }


        function TodoChecked(id) {
            todos[id].done = !todos[id].done;
            RenderAllTodos();
        }

        function CreateTodo() {
            newtodo = {
                text: currentTodo.text,
                done: false,
                id: todos.length
            }
            todos.push(newtodo);
            DrawTodo(newtodo);
        }
    </script>

    <script>
        var ticketTodos = [{

            purchasing_price: "",
            selling_price: "",
            ticket_limit: "",
            ticket_type: "",
            done: false,
            id: 0
        }];
        var currentTicketTodo = {

            purchasing_price: "",
            selling_price: "",
            ticket_limit: "",
            ticket_type: "",
            done: false,
            id: 0
        }

        function DrawTicketTodo(todo) {
            var newTodoHTML = `
                <div class="pb-3 todo-item" todo-id="${todo.id}">
                    <!-- ... your existing HTML code ... -->

                    <div class="input-group">

                        <div class="form-group col-5" style='margin-right:30px;'>
                            <label class="col-form-label">Ticket Type</label>
                            <input type="text" name="ticket_type[]" class="form-control ${todo.done && " todo-done "} " aria-label="Text input with checkbox"
                                placeholder="Ticket Type"
                                value="${todo.ticket_type}"
                            >

                            @error('ticket_type.*')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <div class="form-group col-5 ">
                        <label class="col-form-label">Ticket Limit</label>
                        <input type="number" name="ticket_limit[]" class="form-control ${todo.done && " todo-done "} " aria-label="Text input with checkbox"
                            placeholder="Ticket Limit"
                            value="${todo.ticket_limit}"
                        >
                        @error('ticket_limit.*')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group col-5"style='margin-right:30px;' >
                        <label class="col-form-label">selling Price</label>
                        <input type="text" name="selling_price[]" class="form-control ${todo.done && " todo-done "} " aria-label="Text input with checkbox"
                            placeholder="selling Price"
                            value="${todo.selling_price}"
                        >
                        @error('selling_price.*')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group col-5" >
                        <label class="col-form-label">purchasing Price</label>
                        <input type="text" name="purchasing_price[]" class="form-control ${todo.done && " todo-done "} " aria-label="Text input with checkbox"
                            placeholder="purchasing Price"
                            value="${todo.purchasing_price}"
                        >
                        @error('purchasing_price.*')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                        <button todo-id="${todo.id}" class=" btn btn-outline-secondary bg-primary text-white" type="button" onclick="DeleteTicketTodo(this);" id="button-addon2 " style="margin: auto; margin-bottom: 0;">X</button>


                    </div>

                    <!-- ... your existing HTML code ... -->
                </div>
            `;

            var newTicketTodo = $.parseHTML(newTodoHTML);
            $("#ticket-todo-container").append(newTicketTodo);
        }

        function RenderAllTicketTodos() {
            var container = document.getElementById("ticket-todo-container");
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }

            for (var i = 0; i < ticketTodos.length; i++) {
                DrawTicketTodo(ticketTodos[i]);
            }
        }

        function DeleteTicketTodo(button) {
            var deleteID = parseInt(button.getAttribute("todo-id"));

            for (let i = 0; i < ticketTodos.length; i++) {
                if (ticketTodos[i].id === deleteID) {
                    var todoElement = document.querySelector(`.todo-item[todo-id="${deleteID}"]`);
                    todoElement.parentNode.removeChild(todoElement);

                    ticketTodos.splice(i, 1);

                    updateTicketTodoIndices();
                    break;
                }
            }
        }

        function updateTicketTodoIndices() {
            for (let i = 0; i < ticketTodos.length; i++) {
                ticketTodos[i].id = i;
            }
        }

        function CreateTicketTodo() {
            newTicketTodo = {

                price: currentTicketTodo.price,
                ticket_limit: currentTicketTodo.ticket_limit,
                ticket_type: currentTicketTodo.ticket_type,
                done: false,
                id: ticketTodos.length
            }
            ticketTodos.push(newTicketTodo);
            DrawTicketTodo(newTicketTodo);
        }

        // Initialize ticket todos
        RenderAllTicketTodos();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap tabs
            var tabs = new bootstrap.Tab(document.querySelector('#en-tab'));
            tabs.show();

            // Add event listener to update inputs based on active tab
            var tabsList = document.querySelectorAll('.nav-link');
            tabsList.forEach(function(tab) {
                tab.addEventListener('shown.bs.tab', function(event) {
                    var activeTabId = event.target.getAttribute('href').substring(1);
                    updateInputsVisibility(activeTabId);
                });
            });

            // Function to update inputs visibility based on the active tab
            function updateInputsVisibility(activeTabId) {
                var allTabs = document.querySelectorAll('.tab-pane');
                allTabs.forEach(function(tab) {
                    if (tab.id === activeTabId) {
                        tab.classList.add('show', 'active');
                    } else {
                        tab.classList.remove('show', 'active');
                    }
                });
            }
        });
    </script>
@endsection

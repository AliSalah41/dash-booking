<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Application Form</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom styles here */
        .form-container {
            border: 2px solid #ddd;
            padding: 20px;
            margin: 20px;
            direction: rtl;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section .card-header {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container mt-5 form-container border border-dark p-4">
        {{--  <h2 class="mb-4">بطاقة النازل</h2>  --}}
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h2 class="mb-4">بطاقة النازل</h2>

                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <span class="mr-2" >رقم الغرفة</span>
                        <span class="mr-2 ml-2" style="color: #008cff">Room No :</span>


                    </div>
                </div>
            </div>
        </div>


        <form>



                    <div class="card-header"></div>
                    <div class="card-body">


                            <div class="form-group">
                                <label >.......................... :
                                     الاسم

                                     /<span style="color: #008cff"> First Name  </span></label>

                            </div>


                                <div class="form-group">
                                    <label >..........................  :الجنس /<span style="color: #008cff"> Gender </span></label>
                                </div>

                                <div class="form-group">
                                    <label >..........................  : تاريخ ومكان الولادة /<span style="color: #008cff"> Date and place of birth </span></label>
                                </div>

                                <div class="form-group">
                                    <label >..........................  : الجنسية /<span style="color: #008cff"> Nationality </span></label>
                                </div>

                                <div class="form-group">
                                    <label >..........................  :السكنى الاعتيادية /<span style="color: #008cff"> Country of usual residence </span></label>
                                </div>

                                <div class="form-group">
                                    <label >..........................  : العنوان بتونس /<span style="color: #008cff"> Address in Tunisia </span></label>
                                </div>

                                <div class="form-group">
                                    <label >..........................  :البريد الالكترونى /<span style="color: #008cff"> E-mail </span></label>
                                </div>

                                <div class="form-group">
                                    <label >..........................  :المهنة /<span style="color: #008cff"> Occupation </span></label>
                                </div>


                                <div class="form-group">
                                    <label >..........................  :رقم الهوية وتاريخ الاصدار /<span style="color: #008cff"> N of Identity document and date off delivery </span></label>
                                </div>

                                <div class="form-group ml-5">
                                    <label >..........................  :بطاقة تعريف /<span style="color: #008cff"> I.D.C </span>/<span style="color: #008cff"> C.I.N </span></label>
                                </div>

                                <div class="form-group ml-5">
                                    <label >..........................  :جواز سفر /<span style="color: #008cff"> Passport </span></label>
                                </div>

                                <div class="form-group">
                                    <label >..........................  : تاريخ وتوقيت الوصول /<span style="color: #008cff"> Date and time of arrival </span></label>
                                </div>

                                <div class="form-group ">


                                        <label style="margin-left: 250px">..........................  :الوجهة المقصودة /<span style="color: #008cff"> Destination </span></label>
                                        <label  >..........................  :قادم من /<span style="color: #008cff"> Coming From </span></label>

                               </div>

                               <div class="form-group">
                                <label >..........................  :الوسيلة ورقمها المنجمى /<span style="color: #008cff"> The means of transport and its number </span></label>
                            </div>

                            <div class="form-group">
                                <label >..........................  :تاريخ المغادرة /<span style="color: #008cff"> Departure date </span></label>
                            </div>
                        </div>



                    </div>






        </form>
    </div>

    <!-- Bootstrap JS scripts (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

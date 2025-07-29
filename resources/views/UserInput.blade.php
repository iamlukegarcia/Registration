<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quick Count App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('TailwindCharts/flowbite.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <style>
        .navbar-nav {
            margin-left: auto;
        }

        .navbar {
            margin-left: auto;
        }
    </style>
</head>


<body>





    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-sm md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 bg-red-700 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                    <li>
                        <form id=" " class=" " method="post" action="{{ route('login.logout') }}">
                            @csrf
                            <button href="#"
                                class=" w-full py-2 px-3 text-white bg-red-700 rounded-sm md:bg-transparent md:p-0"
                                aria-current="page">LOGOUT</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     <div class="container">
        <div class="row">
            <div class="col-sm">

            </div>

            <div class="col-sm">
                {{-- user info fetch --}}

                <div class="block my-3 max-w-sm p-6 bg-gray-200 border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">
                    <div>
                        <div  >
                            Welcome {{ $name }}  
                        </div>
                    </div>
                    <div class= >
                        <div  >
                         
                        </div>
                    </div>
                </div>



                {{-- Start user input --}}
                @if (session('Success'))
                    <div class="alert alert-success">
                        {{ session('Success') }}
                    </div>
                @endif
                <div class="w-full max-w-sm p-3 bg-gray border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8">
                    <form id="userform" class="space-y-6" method="post" action="{{ route('user.update') }}">
                        @csrf
                        <div>
                            <label for="label1" class="block mb-2 text-lg font-weight-bold text-gray-900">Ilan ang
                                nakaboto na?</label>
                            <input type="number" class="form-control" name="id" value=" "
                                hidden>
                            <input type="number" class="form-control" name="LastVoteUpdate"
                                value=" " hidden>
                            <input type="number" class="form-control" name="LastInvalidVoteUpdate"
                                value=" " hidden>
                            <input type="number" class="form-control" name="Registered" value=" "
                                hidden>
                            <input type="number" name="vote" id="vote"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder=" " required />
                        </div>
                        <div>
                            <label for="label1" class="block mb-2 text-lg font-weight-bold text-gray-900">Ilan ang
                                Invalid votes? </label>
                            <input type="number" name="Invalidvote" id="Invalidvote"
                                placeholder="Ex. "
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />

                            <br><br>
                            <h3 class="text-3xl font-bold"> Valid Votes: <span class="font-italic">
                                    
                                    Vote/s </span>
                            </h3>

                            <h3 class="text-3xl font-bold"> Invalid Votes: <span
                                    class= "font-italic text-red-900"> Vote/s</span>
                            </h3>
                        </div>
                        <div class="flex items-start">

                        </div>
                        <button id="confirm" data-modal-target="static-modal" data-modal-toggle="static-modal"
                            type="button"
                            class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">SUBMIT</button>
                    </form>
                    {{-- //error catch in case input is less than last update --}}
                    @if ($errors->any())
                        <div class="mt-2">

                            @foreach ($errors->all() as $error)
                                <p class="text-center text-danger">
                                    {{ $error }}
                                </p>
                            @endforeach

                        </div>

                    @endif
                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>
    </div>







    <!-- Main modal -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-2 md:p-2 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h4 class="text-xl text-center font-bold text-red-900 dark:text-white">
                        Are you sure you want to submit this data?
                    </h4>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <span>Bilang ng nakaboto: </span>
                    <h3 id="VoteInput" class="text-base text-center leading-relaxed text-gray-700 "> </h3>
                    <span>Invalid Votes: </span>
                    <h3 id="Invalidinput" class="text-base text-center leading-relaxed text-gray-700 "> </h3>


                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="submit" data-modal-hide="static-modal" type="submit"
                        class="px-4 py-3 mx-1 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Submit</button>
                    <button data-modal-hide="static-modal" type="button"
                        class="px-4 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>
                </div>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <script type="application/javascript">
    import { initFlowbite } from 'flowbite'

    // initialize components based on data attribute selectors
    window.addEventListener('load', function() {
    })
    initFlowbite();
    const modal = FlowbiteInstances.getInstance('Modal', 'static-modal');
    modal.show();
    </script>

    <script>
        $(function() {
            $('#submit').on('click', function(e) {
                $('#userform').submit();
            });
        });
    </script>
    <script>
        $("#confirm").on("click", function() {
            var vote = $("#vote").val();
            var invalidvote = $("#Invalidvote").val();

            $("#VoteInput").text(vote);
            $("#Invalidinput").text(invalidvote);
            console.log(invalidvote)
        });
    </script>

</body>

</html>
